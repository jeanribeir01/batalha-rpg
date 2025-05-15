<?php

namespace App\Model;

class Heroi
{
    public string $nome;
    public int $nivel;
    public array $armas = [];
    public int $pontosDeVidaMax;
    public int $pontosDeVidaAtual;

    public function __construct(string $nome, int $nivel, int $pontosDeVidaBase = 100)
    {
        $this->nome = $nome;
        $this->nivel = $nivel;
        $this->pontosDeVidaMax = $pontosDeVidaBase + ($nivel * 10);
        $this->pontosDeVidaAtual = $this->pontosDeVidaMax;
    }

    public function adicionarArma(Arma $arma): void
    {
        $this->armas[] = $arma;
    }

    public function getArmas(): array
    {
        return $this->armas;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function getPontosDeVidaAtual(): int
    {
        return $this->pontosDeVidaAtual;
    }

    public function getPontosDeVidaMax(): int
    {
        return $this->pontosDeVidaMax;
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

    public function getDanoAtaque(): int
    {
        if (!empty($this->armas)) {
            return $this->armas[0]->getDano() + $this->nivel;
        }
        return 1 + $this->nivel;
    }

    public function getNomeArmaPrincipal(): string
    {
        if (!empty($this->armas)) {
            return $this->armas[0]->getNome();
        }
        return "Soco";
    }
}