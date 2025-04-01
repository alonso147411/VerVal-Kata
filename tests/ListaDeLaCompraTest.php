<?php

namespace Deg540\Prueba\Tests;


use Deg540\Prueba\ListaDeLaCompra;
use PHPUnit\Framework\TestCase;

class ListaDeLaCompraTest extends TestCase
{

    /**
     * @test
     */
    public function addProductReturnsProductAndCuantity()
    {
        $lista = new ListaDeLaCompra();
        $this->assertEquals(
            [
                'product' => 'leche',
                'cuantity' => 2
            ],
            $lista->addProduct('Leche', 2)
        );
    }


}
