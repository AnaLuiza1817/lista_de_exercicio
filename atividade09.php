<?php

function analisarNumero($numero) {
    $parOuImpar = ($numero % 2 == 0) ? 'Par' : 'Ímpar';
    $primo = verificarPrimo($numero);
    $perfeito = verificarPerfeito($numero);
    return [
        'numero' => $numero,
        'par_ou_impar' => $parOuImpar,
        'primo' => $primo,
        'perfeito' => $perfeito
    ];
}


function verificarPrimo($numero) {
    if ($numero < 2) {
        return false;
    }
    
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false; 
        }
    }
    
    return true; 
}
function verificarPerfeito($numero) {
    if ($numero < 1) {
        return false;
    }
    
    $somaDivisores = 0;
    
    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $somaDivisores += $i;
        }
    }
    
    return $somaDivisores == $numero;
}

function exibirAnalise($numero) {
    $resultado = analisarNumero($numero);
    
    echo "Análise do número " . $resultado['numero'] . ":\n";
    echo "├─ Par ou Ímpar: " . $resultado['par_ou_impar'] . "\n";
    echo "├─ Primo: " . ($resultado['primo'] ? 'Sim ✅' : 'Não ❌') . "\n";
    echo "└─ Perfeito: " . ($resultado['perfeito'] ? 'Sim ✅' : 'Não ❌') . "\n\n";
}


exibirAnalise(6);     
exibirAnalise(28);     
exibirAnalise(496);    
exibirAnalise(7);      
exibirAnalise(10);     
exibirAnalise(1);      
exibirAnalise(0);      

?>