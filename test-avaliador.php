<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

// Arrumo a casa para o teste - Arrange - Given
$leilao = new Leilao('Fiat 47 0KM');

$maria = new Usuario('Maria');
$joao = new Usuario('Joao');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

// Executo o código a ser testado - Act - When
$leiloeiro->avalia($leilao);
$maiorValor = $leiloeiro->getMaiorValor();

// Verifico se a saída é a esperada - Assert - Then
$valorEsperado = 2500;
if ($maiorValor ==  $valorEsperado) {
    echo 'TESTE OK';
} else {
    echo 'TESTE FALHOU';
}
