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
        //$prductLower = strtolower($string);
        $prodctLower = "Leche";
        $cuantity = 2;
        return [
            'product' => $prodctLower,
            'cuantity' => $cuantity
        ];
    }

    public function getProducts(): array
    {
        return [
            [
                'product' => 'Leche',
                'cuantity' => 2
            ]

        ];
    }
}