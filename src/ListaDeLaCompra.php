<?php

namespace Deg540\Prueba;

class ListaDeLaCompra
{
    /**
     * @var array|mixed
     */
    private array $productos;


    /**
     *
     */
    public function __construct(array $productos = [])
    {
        $this->productos = $productos;
    }
    public function processListaDeLaCompra(string $instruccion): string
    {
        $partes = explode(' ', $instruccion);
        $accion = strtolower(array_shift($partes));
        $nombre = strtolower(array_shift($partes) ?? '');
        $cantidad = intval(array_shift($partes) ?? 1);

        switch ($accion) {
            case 'añadir':
                $this->addProduct($nombre, $cantidad);
                break;
            case 'eliminar':
                $this->deleteProduct($nombre);
                break;
            case 'vaciar':
                $this->emptyList();
                break;
            default:
                return 'Instrucción no válida';
        }

        return $this->obtainActualState();

    }

    private function addProduct(string $name, int $quantity = 1): void
    {
        foreach ($this->productos as &$producto) {
        if ($producto['nombre'] === $name) {
            $producto['cantidad'] += $quantity;
            return;
        }
    }
        $this->productos[] = ['nombre' => $name, 'cantidad' => $quantity];
    }

    private function deleteProduct(string $name): void
    {
        foreach ($this->productos as $key => $producto) {
            if ($producto['nombre'] === $name) {
                unset($this->productos[$key]);
                $this->productos = array_values($this->productos);
                return;
            }
        }

    }

    private function emptyList(): void
    {
        $this->productos = [];
    }

    private function obtainActualState(): string
    {
        usort($this->productos, function ($a, $b) {
            return strcmp($a['nombre'], $b['nombre']);
        });

        $estado = array_map(function ($producto) {
            return "{$producto['nombre']} x{$producto['cantidad']}";
        }, $this->productos);

        return implode(', ', $estado);
    }
}