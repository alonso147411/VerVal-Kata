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

    public function addProduct(string $name, int $quantity = 1): string
    {
        if ($quantity <= 0) {
            $quantity = 1;
        }
        $name = strtolower($name);
        foreach ($this->products as &$producto) {
            if ($producto['nombre'] === $name) {
                $producto['cantidad'] += $quantity;
                return "{$name} x{$producto['cantidad']}";
            }
        }
        $this->products[] = ['nombre' => $name, 'cantidad' => $quantity];
        return "{$name} x{$quantity}";
    }

    public function deleteProduct(string $name): string
    {
        $name = strtolower($name);
        foreach ($this->products as $key => $producto) {
            if ($producto['nombre'] === $name) {
                unset($this->products[$key]);
                $this->products = array_values($this->products);
                return "Eliminado: {$name}";
            }
        }
        return "Unset\nEl producto seleccionado no existe";

    }
    public function obtainProducts(): array
    {
        return $this->products;
    }
}