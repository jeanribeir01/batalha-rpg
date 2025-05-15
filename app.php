<?php

require 'vendor/autoload.php';

use App\Model\Heroi;
use App\Model\Arma;
use App\Model\Monstro;
use App\Model\Batalha;
use App\Model\Resultado;

echo "=====================================\n";
echo "        Batalha no estilo RPG        \n";
echo "=====================================\n\n";

$espadaLonga = new Arma("Espada Longa", 12, "Corte");
$cajadoElemental = new Arma("Cajado Elemental", 15, "Magia");
$arcoElfico = new Arma("Arco Élfico", 18, "Perfuração");
$machadoDeGuerra = new Arma("Machado de Guerra", 14, "Corte Pesado");
$adagaVeneno = new Arma("Adaga de Veneno", 8, "Perfuração com Veneno");


$heroisDisponiveis = [];
$heroisDisponiveis[] = new Heroi("Aragorn", 5, 120);
$heroisDisponiveis[0]->adicionarArma($espadaLonga);

$heroisDisponiveis[] = new Heroi("Gandalf", 7, 80);
$heroisDisponiveis[1]->adicionarArma($cajadoElemental);

$heroisDisponiveis[] = new Heroi("Légolas", 10 , 200);
$heroisDisponiveis[2]->adicionarArma($arcoElfico);

$heroisDisponiveis[] = new Heroi("Gimli", 6, 150);
$heroisDisponiveis[3]->adicionarArma($machadoDeGuerra);

$heroisDisponiveis[] = new Heroi("Frodo", 3, 60);
$heroisDisponiveis[4]->adicionarArma($adagaVeneno);


$monstrosDisponiveis = [];
$monstrosDisponiveis[] = new Monstro("Orc Grunth", 70, "Orc", 8);
$monstrosDisponiveis[] = new Monstro("Smaug", 1000, "Dragão", 100);
$monstrosDisponiveis[] = new Monstro("Goblin Chefe", 50, "Goblin", 6);
$monstrosDisponiveis[] = new Monstro("Esqueleto Guerreiro", 40, "Morto-vivo", 5);
$monstrosDisponiveis[] = new Monstro("Aranha Gigante", 60, "Aracnídeo", 7);


$indiceHeroiSorteado = array_rand($heroisDisponiveis);
$heroiDaBatalha = $heroisDisponiveis[$indiceHeroiSorteado];

$indiceMonstroSorteado = array_rand($monstrosDisponiveis);
$monstroDaBatalha = $monstrosDisponiveis[$indiceMonstroSorteado];

echo "Preparando Batalha: {$heroiDaBatalha->getNome()} vs {$monstroDaBatalha->getNome()}\n";

$batalha = new Batalha($heroiDaBatalha, $monstroDaBatalha);
$resultadoDaBatalha = $batalha->simularBatalha();


echo "\n--- Resultado da Batalha ---\n";
foreach ($resultadoDaBatalha->getLog() as $entradaLog) {
    echo $entradaLog . "\n";
}

$vencedor = $resultadoDaBatalha->getVencedor();
if ($vencedor) {
    echo "\nO grande vencedor da Batalha é: " . $vencedor->getNome() . "!\n";
} else {
    echo "\nA Batalha terminou em empate ou não houve vencedor claro.\n";
}
echo "=====================================\n\n";