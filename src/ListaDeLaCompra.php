<?php

namespace Deg540\Prueba;

class ListaDeLaCompra
{
    /**
     * @var array|mixed
     */
    private mixed $array;

    /**
     *
     */
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    public function addProduct(string $string, int $int): int
    {
        $productLower = strtolower($string);
        $cuantity = 0;
        if ($this->existsProduct($productLower)) {
            $cuantity += $int;
        }
        if ($int === 0) {
            $cuantity = 1;
        }
        return array_push($this->array, [
            'product' => $productLower,
            'cuantity' => $cuantity
        ]);
    }

    private function existsProduct(string $productLower) : bool
    {
        return $this->array = array_map($productLower, $this->array);
    }

    public function deleteProduct(string $string): array
    {
        $productLower = strtolower($string);
        return $this->remover($productLower, $this->array);

    }
    private function remover ($valor,$arr)
    {
        foreach (array_keys($arr, $valor) as $key)
        {
            unset($arr[$key]);
        }
        echo "Removiendo: ".$valor."\n\n";
        return $arr;
    }

}