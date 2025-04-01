<?php

namespace Deg540\Prueba;

class ListaDeLaCompra
{
    /**
     * @var array|mixed
     */
    private array $products;

    /**
     *
     */
    public function __construct(array $productos = [])
    {
        $this->products = $productos;
    }

    public function addProduct(string $name, int $numberProducts = 1): string
    {
        if ($numberProducts <= 0) {
            $numberProducts = 1;
        }
        $name = strtolower($name);
        foreach ($this->products as &$producto) {
            if ($producto['nombre'] === $name) {
                $producto['cantidad'] += $numberProducts;
                return "{$name} x{$producto['cantidad']}";
            }
        }
        $this->products[] = ['nombre' => $name, 'cantidad' => $numberProducts];
        return "{$name} x{$numberProducts}";
    }

    public function deleteProduct(string $name): string
    {
        $nombre = strtolower($name);
        foreach ($this->products as $key => $producto) {
            if ($producto['nombre'] === $nombre) {
                unset($this->products[$key]);
                return "Eliminado: {$nombre}";
            }
        }
        return "Unset\nEl producto seleccionado no existe";

    }
    public function obtainProducts(): array
    {
        return $this->products;
    }
}