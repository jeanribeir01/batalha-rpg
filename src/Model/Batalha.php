<?php

namespace App\Model;

class Batalha
{
    public Heroi $heroi;
    public Monstro $monstro;
    public Resultado $resultado;
    public int $turno = 0;
    public function __construct(Heroi $heroi, Monstro $monstro)
    {
        $this->heroi = $heroi;
        $this->monstro = $monstro;
        $this->resultado = new Resultado();
    }
    public function simularBatalha(): Resultado
    {
        $this->resultado->adicionarLog("A batalha começa entre {$this->heroi->getNome()} e {$this->monstro->getNome()}!");
        $this->resultado->adicionarLog("{$this->heroi->getNome()} (PV: {$this->heroi->getPontosDeVidaAtual()}) vs {$this->monstro->getNome()} (PV: {$this->monstro->getPontosDeVidaAtual()})");

        $quemComeca = random_int(0, 1);

        $atacanteAtual = ($quemComeca === 0) ? $this->heroi : $this->monstro;
        $defensorAtual = ($quemComeca === 0) ? $this->monstro : $this->heroi;

        $this->resultado->adicionarLog(($quemComeca === 0) ? "O Herói {$this->heroi->getNome()} ataca primeiro!" : "O Monstro {$this->monstro->getNome()} ataca primeiro!");

        while ($this->heroi->estaVivo() && $this->monstro->estaVivo()) {
            $this->turno++;
            $this->resultado->adicionarLog("\n--- Turno {$this->turno} ---");

            if ($atacanteAtual === $this->heroi) {
                $danoHeroi = $this->heroi->getDanoAtaque();
                $this->monstro->receberDano($danoHeroi);

                $this->resultado->adicionarLog(
                    "{$this->heroi->getNome()} ataca {$this->monstro->getNome()} com {$this->heroi->getNomeArmaPrincipal()} causando {$danoHeroi} de dano. " .
                    "{$this->monstro->getNome()} tem {$this->monstro->getPontosDeVidaAtual()}/{$this->monstro->getPontosDeVidaMax()} PV."
                );

                if (!$this->monstro->estaVivo()) {
                    $this->resultado->setVencedor($this->heroi);
                    $this->resultado->adicionarLog("{$this->monstro->getNome()} foi derrotado!");
                    $this->resultado->adicionarLog("{$this->heroi->getNome()} é o vencedor!");
                    break;
                }

                $atacanteAtual = $this->monstro;
                $defensorAtual = $this->heroi;

            } else {
                $danoMonstro = $this->monstro->getDanoAtaque();
                $this->heroi->receberDano($danoMonstro);

                $this->resultado->adicionarLog(
                    "{$this->monstro->getNome()} ataca {$this->heroi->getNome()} causando {$danoMonstro} de dano. " .
                    "{$this->heroi->getNome()} tem {$this->heroi->getPontosDeVidaAtual()}/{$this->heroi->getPontosDeVidaMax()} PV."
                );

                if (!$this->heroi->estaVivo()) {
                    $this->resultado->setVencedor($this->monstro);
                    $this->resultado->adicionarLog("{$this->heroi->getNome()} foi derrotado!");
                    $this->resultado->adicionarLog("{$this->monstro->getNome()} é o vencedor!");
                    break;
                }

                $atacanteAtual = $this->heroi;
                $defensorAtual = $this->monstro;
            }
        }

        if (!$this->resultado->getVencedor()) {
            $this->resultado->adicionarLog("A batalha terminou sem um vencedor claro (ambos derrotados simultaneamente ou outro critério).");
        }

        return $this->resultado;
    }
}