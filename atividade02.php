<?php

function inverterTexto($texto) {
    $quantidade = strlen($texto);
    echo "A string original possui $quantidade caracteres.<br>";
    
    $textoInvertido = strrev($texto);
    return $textoInvertido;
}

$textoOriginal = "Olá, mundo!";
$textoInvertido = inverterTexto($textoOriginal);

echo "Texto original: $textoOriginal<br>";
echo "Texto invertido: $textoInvertido";

?>