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
        $result = $lista->addProduct('Leche', 2);
        $this->assertEquals(
            [
                'product' => 'leche',
                'cuantity' => 2
            ],
            $result
        );
    }
    /**
     * @test
     */
    public function addProductWithoutCuantityReturnsProductWithDefalutValue()
    {
        $lista = new ListaDeLaCompra();
        $result = $lista->addProduct('Leche', 0);
        $this->assertEquals(
            [
                'product' => 'huevos',
                'cuantity' => 1
            ],
            $result
        );
    }
    /**
     * @test
     */
    public function deleteProductReturnsProductListWithoutProduct()
    {
        $lista = new ListaDeLaCompra();
        $result = $lista->deleteProduct('Leche');
        $this->assertEquals(
            [
                'product' => 'huevos',
                'cuantity' => 1
            ],
            $result
        );
    }




}
