<?php

namespace App\Model;

class Resultado
{
    public ?object $vencedor = null;
    public array $log = [];

    public function __construct()
    {
    }

    public function adicionarLog(string $mensagem): void
    {
        $this->log[] = $mensagem;
    }

    public function getLog(): array
    {
        return $this->log;
    }

    public function setVencedor(object $vencedor): void
    {
        $this->vencedor = $vencedor;
    }

    public function getVencedor(): ?object
    {
        return $this->vencedor;
    }
}