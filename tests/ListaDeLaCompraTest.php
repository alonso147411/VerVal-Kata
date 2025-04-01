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
        $lista->addProduct("Leche", 2);
        $this->assertEquals("Leche", $lista->getProducts()[0]['product']);
        $this->assertEquals(2, $lista->getProducts()[0]['cuantity']);
    }


}
