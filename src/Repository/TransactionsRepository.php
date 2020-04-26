<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Transactions;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Traits\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Transactions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transactions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transactions[]    findAll()
 * @method Transactions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionsRepository extends ServiceEntityRepository
{
    use Validator;
    private $em;
    private $stock;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em, StockRepository $stock)
    {
        parent::__construct($registry, Transactions::class);
        $this->em = $em;
        $this->stock = $stock;
    }

    /**
     * @param array $transactions
     * @return array
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getTransactions():array
    {
        $transactions = $this->findAll();
        $data = [];

        foreach ($transactions as $transaction) {
            $data[] = [
                'id' => $transaction->getId(),
                'type' => $transaction->getType(),
                'quantity' => $transaction->getQuantity(),
                'price' => $transaction->getPrice(),
                'status' => 1,
            ];
        }

        return $data;
    }

    /**
     * @param array $data
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function saveTransaction(array $data):void
    {
        $transaction = new Transactions();
        $stockCount = (int) $this->stock->countStock();
        $profit = 0;
        $type = $data['type']??null;
        $quantity = $data['quantity']??null;
        $price = $data['price']??null;

        if (empty($type) || empty($quantity) || empty($price)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->transactionValidate($type, $quantity, $price, $stockCount);

        if (2 === $type) {
            $profit = $this->calculateProfit($quantity, $price);
        } else {
            $this->stock->insert($quantity, $price);
        }

        $transaction
            ->setType($type)
            ->setPrice($price)
            ->setQuantity($quantity)
            ->setProfit($profit);

        $this->em->persist($transaction);
        $this->em->flush();
    }

    /**
     * @return float
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function calculateMarginProfit(): float
    {
        $marginProfit = $this->createQueryBuilder('s')
            ->select('SUM(s.profit)')
            ->getQuery()
            ->getSingleScalarResult();

        return (float) $marginProfit;
    }

    /**
     * @param int $quantity
     * @param float $price
     * @return float
     */
    private function calculateProfit(int $quantity, float $price):float
    {
        $tempQuantity = $quantity;
        $profit = 0;

        while (0 !== $tempQuantity) {
            $stock = $this->stock->findOneBy([]);
            $stockPrice = $stock->getPrice();
            $stockQuantity = $stock->getQuantity();

            if ($stockQuantity <= $tempQuantity) {
                $profit += $stockQuantity * ($price - $stockPrice);
                $tempQuantity -= $stockQuantity;
                $this->stock->delete($stock);
            } else {
                $profit += $tempQuantity * ($price - $stockPrice);
                $this->stock->update($stock, $tempQuantity);
                $tempQuantity = 0;
            }
        }

        return $profit;
    }
}
