<?php

namespace Deg540\Prueba;

class ListaDeLaCompra
{

    /**
     *
     */
    public function __construct()
    {
    }


    public function addProduct(string $string, int $int): array
    {
        $productLower = strtolower($string);
        if ($this->existsProduct($productLower)) {
            $cuantity = 0;
            $cuantity += $int;
        }
        if ($this->noCuantityGiven($int)) {
            $cuantity = 1;
        }
        return [
            'product' => $productLower,
            'cuantity' => $cuantity
        ];
    }

    private function existsProduct(string $productLower) : bool
    {
        return in_array($productLower, ['leche', 'pan', 'huevos']);
    }

    private function noCuantityGiven(int $int): bool
    {
        return $int === 0;
    }



}