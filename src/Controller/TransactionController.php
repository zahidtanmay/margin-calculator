<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TransactionsRepository;
use Symfony\Component\HttpFoundation\{Request, JsonResponse, Response};
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class TransactionController
 * @package App\Controller
 */
class TransactionController extends AbstractController
{
    /**
     * @var TransactionsRepository
     */
    private $transaction;

    /**
     * TransactionController constructor.
     * @param TransactionsRepository $transaction
     */
    public function __construct(TransactionsRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @Route("/api/transaction", name="transaction", methods={"GET"})
     * @return JsonResponse
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(): JsonResponse
    {
        $transactions = $this->transaction->findAll();
        $data = $this->transaction->getTransactions($transactions);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/api/transaction", name="transaction_process", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function store(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $this->transaction->saveTransaction($data);

        return new JsonResponse(['status' => 'Transaction created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/transaction/profit", name="margin_profit", methods={"GET"})
     * @return JsonResponse
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function marginProfit(): JsonResponse
    {
        $marginProfit = $this->transaction->createQueryBuilder('s')
            ->select('SUM(s.profit)')
            ->getQuery()
            ->getSingleScalarResult();

        return new JsonResponse(['marginProfit' => (float) $marginProfit], Response::HTTP_OK);
    }

    /**
     * @Route("/api/transaction/stock", name="stock_count", methods={"GET"})
     * @return JsonResponse
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function stockCount(): JsonResponse
    {
        $stockCount = $this->transaction->stockCount();

        return new JsonResponse(['stock' => $stockCount], Response::HTTP_OK);
    }
}
