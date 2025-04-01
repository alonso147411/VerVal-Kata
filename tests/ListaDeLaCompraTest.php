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
        $resultado = $lista->addProduct('pan', 2);
        $this->assertEquals('pan x2', $resultado);
    }
    /**
     * @test
     */
    public function addProductWithoutCuantityReturnsProductWithDefalutValue()
    {
        $lista = new ListaDeLaCompra();
        $resultado = $lista->addProduct('pan');
        $this->assertEquals('pan x1', $resultado);
    }
    /**
     * @test
     */
    public function añadirProductoExistente()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->addProduct('pan', 2);
        $this->assertEquals('pan x3', $resultado);
    }
    /**
     * @test
     */
    public function deleteProductReturnsProductListWithoutProduct()
    {

        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->deleteProduct('pan');
        $this->assertEquals('Eliminado: pan', $resultado);
    }




}
