<?php

function criptografarMensagem($texto, $deslocamento = 3) {
    $resultado = '';
    $tamanho = strlen($texto);
    
    for ($i = 0; $i < $tamanho; $i++) {
        $caractere = $texto[$i];
        
        if (ctype_upper($caractere)) {
            $codigo = ord($caractere);
            $codigo = (($codigo - 65 + $deslocamento) % 26) + 65;
            $resultado .= chr($codigo);
        } elseif (ctype_lower($caractere)) {
            $codigo = ord($caractere);
            $codigo = (($codigo - 97 + $deslocamento) % 26) + 97;
            $resultado .= chr($codigo);
        } else {
            $resultado .= $caractere;
        }
    }
    
    return $resultado;
}

function descriptografarMensagem($texto, $deslocamento = 3) {
    return criptografarMensagem($texto, 26 - $deslocamento);
}

function exibirMensagem($original) {
    $criptografada = criptografarMensagem($original);
    $descriptografada = descriptografarMensagem($criptografada);
    
    echo "=== CRIPTOGRAFIA CIFRA DE CÉSAR ===\n";
    echo "Mensagem original: " . $original . "\n";
    echo "Mensagem criptografada: " . $criptografada . "\n";
    echo "Mensagem descriptografada: " . $descriptografada . "\n\n";
}

exibirMensagem("Olá Mundo!");
exibirMensagem("PHP é incrível");
exibirMensagem("Hello World");
exibirMensagem("abcdefghijklmnopqrstuvwxyz");
exibirMensagem("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
exibirMensagem("Zebra");

?>