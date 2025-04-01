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
    public function addExistingProductReturnsProductAddingCuantityToExistingOne()
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
    /**
     * @test
     */
    public function deleteProductNotExistingReturnsWarning()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->deleteProduct('leche');
        $this->assertEquals("Unset\nEl producto seleccionado no existe", $resultado);

    }

    /**
     * @test
     */
    public function obteningProductsWithOneElementReturnsProductInList()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1]]);
        $resultado = $lista->obtainProducts();
        $this->assertEquals([['nombre' => 'pan', 'cantidad' => 1]], $resultado);
    }
    /**
     * @test
     */
    public function obteningProductsWithMoreElementsReturnsCompleteProductList()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1], ['nombre' => 'leche', 'cantidad' => 2]]);
        $resultado = $lista->obtainProducts();
        $this->assertEquals([['nombre' => 'pan', 'cantidad' => 1], ['nombre' => 'leche', 'cantidad' => 2]], $resultado);
    }
    /**
     * @test
     */
    public function emptyListReturnsEmptyArray()
    {
        $lista = new ListaDeLaCompra([['nombre' => 'pan', 'cantidad' => 1], ['nombre' => 'leche', 'cantidad' => 2]]);
        $resultado = $lista->emptyList();
        $this->assertEquals([], $resultado);
    }
    /**
     * @test
     */
    public function emptyListWithNoProductsReturnsEmptyArray()
    {
        $lista = new ListaDeLaCompra();
        $resultado = $lista->emptyList();
        $this->assertEquals([], $resultado);
    }


}
