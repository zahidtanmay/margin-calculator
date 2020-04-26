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
        $data = $this->transaction->getTransactions();

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
        $marginProfit = $this->transaction->calculateMarginProfit();

        return new JsonResponse(['marginProfit' => $marginProfit], Response::HTTP_OK);
    }
}
