<?php

namespace tests;


use PHPUnit\Framework\TestCase;

class PruebaTest extends TestCase
{
    public function testPrueba()
    {
        $result = new Prueba('Hola');
        $this->assertEquals('Hola', $result);
    }


}
