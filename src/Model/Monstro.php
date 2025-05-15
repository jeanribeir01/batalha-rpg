<?php

namespace App\Model;

class Monstro
{
    public string $nome;
    public int $pontosDeVidaMax;
    public int $pontosDeVidaAtual;
    public string $tipo;
    public int $danoAtaque;

    public function __construct(string $nome, int $pontosDeVida, string $tipo, int $danoAtaque)
    {
        $this->nome = $nome;
        $this->pontosDeVidaMax = $pontosDeVida;
        $this->pontosDeVidaAtual = $pontosDeVida;
        $this->tipo = $tipo;
        $this->danoAtaque = $danoAtaque;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPontosDeVidaAtual(): int
    {
        return $this->pontosDeVidaAtual;
    }

    public function getPontosDeVidaMax(): int
    {
        return $this->pontosDeVidaMax;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getDanoAtaque(): int
    {
        return $this->danoAtaque;
    }

    public function estaVivo(): bool
    {
        return $this->pontosDeVidaAtual > 0;
    }

    public function receberDano(int $dano): void
    {
        $this->pontosDeVidaAtual -= $dano;
        if ($this->pontosDeVidaAtual < 0) {
            $this->pontosDeVidaAtual = 0;
        }
    }
}