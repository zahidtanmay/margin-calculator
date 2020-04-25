<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class TransactionControllerTest extends WebTestCase
{
    public function testTransactions()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://192.168.10.10:8000/api/transaction');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
