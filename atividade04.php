<?php

function gerarSenha($tamanho) {
    
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $caracteres .= 'abcdefghijklmnopqrstuvwxyz';
    $caracteres .= '0123456789';
    $caracteres .= '!@#$%&*()-_=+';
    
    
    if ($tamanho <= 0) {
        return "Tamanho inválido!";
    }
    
    $senha = '';
    $totalCaracteres = strlen($caracteres);
    
    for ($i = 0; $i < $tamanho; $i++) {
        $indiceAleatorio = rand(0, $totalCaracteres - 1);
        $senha .= $caracteres[$indiceAleatorio];
    }
    
    return $senha;
}

echo "Senha gerada: " . gerarSenha(8);

?>