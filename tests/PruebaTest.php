<?php

namespace Deg540\Prueba\Tests;


use Deg540\Prueba\Prueba;
use PHPUnit\Framework\TestCase;

class PruebaTest extends TestCase
{
    public function testPrueba()
    {
        $result = new Prueba();
        $result = $result->prueba();
        $this->assertEquals(1, $result);
    }


}
