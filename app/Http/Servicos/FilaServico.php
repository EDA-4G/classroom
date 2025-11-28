<?php

namespace App\Http\Servicos;

class FilaServico
{
    private array $elementos = [];

    public function adicionar(mixed $elemento): void
    {
        $this->elementos[] = $elemento;
    }


    public function removerERetornarPrimeiroElemento(array &$array)
    {
        if (count($array) === 0) {
            return null;
        }

        $primeiro = $array[0];

        for ($i = 0; $i < count($array) - 1; $i++) {
            $array[$i] = $array[$i + 1];
        }

        unset($array[count($array) - 1]);

        $array = array_values($array);
        return $primeiro;
    }


    public function removerERetornar(): mixed
    {
        if ($this->estaVazio()) {
            return null;
        }

        return $this->removerERetornarPrimeiroElemento($this->elementos);
    }


    public function tamanho(): int
    {
        return count($this->elementos);
    }


    public function estaVazio(): bool
    {
        return $this->verificarVazio($this->elementos);
    }

    public function verificarVazio($valor): bool
    {
        return (
            $valor === null ||
            $valor === false ||
            $valor === 0 ||
            $valor === 0.0 ||
            $valor === "0" ||
            $valor === ""
            || $valor === []
        );
    }


    public function limparTodosElementos(): void
    {
        $this->elementos = [];
    }
}
