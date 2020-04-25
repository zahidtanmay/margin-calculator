<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @method Stock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stock[]    findAll()
 * @method Stock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockRepository extends ServiceEntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $vi;

    /**
     * StockRepository constructor.
     * @param ManagerRegistry $registry
     * @param EntityManagerInterface $em
     */
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em, ValidatorInterface $vi)
    {
        parent::__construct($registry, Stock::class);
        $this->em = $em;
        $this->vi = $vi;
    }

    /**
     * @return int
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countStock():int
    {
        $count = $this
            ->createQueryBuilder('s')
            ->select('SUM(s.quantity)')
            ->getQuery()
            ->getSingleScalarResult();

        return (int) $count;
    }

    /**
     * @param int $quantity
     * @param float $price
     */
    public function insert(int $quantity, float $price): void
    {
        $stock = new Stock();
        $stock
            ->setQuantity($quantity)
            ->setPrice($price);
        $errors = $this->vi->validate($stock);
        $this->em->persist($stock);
        $this->em->flush();
    }

    /**
     * @param Stock $stock
     * @param int $quantity
     */
    public function update(Stock $stock, int $quantity): void
    {
        $stockQuantity = $stock->getQuantity();
        $stock->setQuantity($stockQuantity - $quantity);
        $this->em->persist($stock);
        $this->em->flush();
    }

    /**
     * @param Stock $stock
     */
    public function delete(Stock $stock):void
    {
        $this->em->remove($stock);
        $this->em->flush();
    }
}