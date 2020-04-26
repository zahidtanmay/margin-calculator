<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ErrorController
 * @package App\Controller
 */
class ErrorController extends AbstractController
{
    /**
     * @param FlattenException $exception
     * @return JsonResponse
     */
    public function show(FlattenException $exception):JsonResponse
    {
        return new JsonResponse([
            'status' => 'error',
            'error'=> [
                'message' => $exception->getMessage(),
                'code' => $exception->getStatusCode(),
            ],
        ]);
    }
}
