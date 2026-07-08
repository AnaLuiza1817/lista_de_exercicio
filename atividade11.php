<?php

function formatarTexto($texto) {
    return [
        'maiusculas' => strtoupper($texto),
        'minusculas' => strtolower($texto),
        'primeira_letra_maiuscula' => ucwords(strtolower($texto)),
        'quantidade_caracteres' => strlen($texto)
    ];
}

function exibirFormatacao($texto) {
    $resultado = formatarTexto($texto);
    
    echo "Texto original: " . $texto . "\n";
    echo "├─ Maiúsculas: " . $resultado['maiusculas'] . "\n";
    echo "├─ Minúsculas: " . $resultado['minusculas'] . "\n";
    echo "├─ Primeira letra de cada palavra em maiúscula: " . $resultado['primeira_letra_maiuscula'] . "\n";
    echo "└─ Quantidade de caracteres: " . $resultado['quantidade_caracteres'] . "\n\n";
}

exibirFormatacao("olá mundo! este é um teste.");
exibirFormatacao("PHP É UMA LINGUAGEM PODEROSA");
exibirFormatacao("programação web com php");
exibirFormatacao("12345");
exibirFormatacao("");

?>