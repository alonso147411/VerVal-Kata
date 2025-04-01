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
        $resultado = $lista->processListaDeLaCompra('añadir pan 2');
        $this->assertEquals('pan x2', $resultado);
    }

    /**
     * @test
     */
    public function addProductWithoutCuantityReturnsProductWithDefalutValue()
    {
        $lista = new ListaDeLaCompra();
        $resultado = $lista->processListaDeLaCompra('añadir pan');
        $this->assertEquals('pan x1', $resultado);
    }

    /**
     * @test
     */
    public function addExistingProductReturnsProductAddingCuantityToExistingOne()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->processListaDeLaCompra('añadir pan 2');
        $this->assertEquals('pan x3', $resultado);
    }

    /**
     * @test
     */
    public function deleteProductReturnsProductListWithoutProduct()
    {

        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->processListaDeLaCompra('eliminar pan');
        $this->assertEquals('', $resultado);
    }

    /**
     * @test
     */
    public function deleteProductNotExistingReturnsWarning()
    {
        $lista = new ListaDeLaCompra();
        $resultado = $lista->processListaDeLaCompra('eliminar pan');
        $this->assertEquals('', $resultado);

    }


    /**
     * @test
     */
    public function emptyListReturnsEmptyArray()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->processListaDeLaCompra('vaciar');
        $this->assertEquals('', $resultado);
    }

}


//class ListaDeLaCompraTest extends TestCase
//{
//
//

//
//    /**
//     * @test
//     */
//    public function processListaDeLaCompraVaciarLista()
//    {
//        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
//        $resultado = $lista->processListaDeLaCompra('vaciar');
//        $this->assertEquals('', $resultado);
//    }
//
//    /**
//     * @test
//     */
//    public function processListaDeLaCompraObtenerEstadoActual()
//    {
//        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1], ['nombre' => 'leche', 'cantidad' => 2]]);
//        $resultado = $lista->processListaDeLaCompra('');
//        $this->assertEquals('leche x2, pan x1', $resultado);
//    }
//}
//}
