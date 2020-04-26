<?php

declare(strict_types=1);

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

trait Validator
{
    public function transactionValidate(int $type, int $quantity, float $price, int $stockCount):void
    {

        if ($type !== 1 && $type !== 2) {
            throw new BadRequestHttpException('Type must be buy or sell');
        }

        if ($quantity <= 0) {
            throw new BadRequestHttpException('Quantity must greater than 0');
        }

        if ($price <= 0) {
            throw new BadRequestHttpException('Price must greater than 0');
        }

        if ($type === 2 && $quantity > $stockCount) {
            throw new BadRequestHttpException('Selling quantity is greater than current stock quantity ('.$stockCount.').');
        }
    }
}
