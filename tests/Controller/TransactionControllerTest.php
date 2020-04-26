<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class TransactionControllerTest extends WebTestCase
{
    public function testGetTransactions()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://127.0.0.1:8000/api/transaction');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStoreTransactionSuccess()
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://127.0.0.1:8000/api/transaction', ['json' => ['quantity' => 5, 'price' => 10, 'type' => 1]]);

        $this->assertEquals(201, $response->getStatusCode());
    }

    public function testStoreTransactionNotFoundError()
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://127.0.0.1:8000/api/transaction', ['json' => []]);

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testStoreTransactionError()
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://127.0.0.1:8000/api/transaction', ['json' => ['quantity' => -5, 'price' => 10, 'type' => 1]]);

        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testCalculateProfit()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://127.0.0.1:8000/api/transaction/profit');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
