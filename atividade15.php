<?php

function calcularIMC($peso, $altura) {
    if ($altura <= 0 || $peso <= 0) {
        return ['erro' => 'Valores inválidos'];
    }
    
    $imc = $peso / ($altura * $altura);
    $classificacao = '';
    
    if ($imc < 18.5) {
        $classificacao = 'Abaixo do peso';
    } elseif ($imc < 25) {
        $classificacao = 'Peso normal';
    } elseif ($imc < 30) {
        $classificacao = 'Sobrepeso';
    } elseif ($imc < 35) {
        $classificacao = 'Obesidade grau I';
    } elseif ($imc < 40) {
        $classificacao = 'Obesidade grau II';
    } else {
        $classificacao = 'Obesidade grau III';
    }
    
    return [
        'imc' => round($imc, 2),
        'classificacao' => $classificacao
    ];
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarSenhaAleatoria($tamanho = 8) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*';
    $senha = '';
    $totalCaracteres = strlen($caracteres);
    
    for ($i = 0; $i < $tamanho; $i++) {
        $senha .= $caracteres[rand(0, $totalCaracteres - 1)];
    }
    
    return $senha;
}

function contarVogais($texto) {
    $vogais = ['a', 'e', 'i', 'o', 'u', 'á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'â', 'ê', 'î', 'ô', 'û'];
    $textoMinusculo = strtolower($texto);
    $quantidade = 0;
    
    for ($i = 0; $i < strlen($textoMinusculo); $i++) {
        if (in_array($textoMinusculo[$i], $vogais)) {
            $quantidade++;
        }
    }
    
    return $quantidade;
}

function inverterTexto($texto) {
    return strrev($texto);
}

function calcularIdade($dataNascimento) {
    $dataNasc = new DateTime($dataNascimento);
    $hoje = new DateTime('now');
    $diferenca = $hoje->diff($dataNasc);
    
    return $diferenca->y;
}

function converterMoeda($valor, $moedaOrigem, $moedaDestino) {
    $cotacoes = [
        'BRL' => 1,
        'USD' => 5.20,
        'EUR' => 5.80,
        'GBP' => 6.70,
        'ARS' => 0.018
    ];
    
    if (!isset($cotacoes[$moedaOrigem]) || !isset($cotacoes[$moedaDestino])) {
        return ['erro' => 'Moeda não suportada'];
    }
    
    $valorEmBRL = $valor * $cotacoes[$moedaOrigem];
    $valorConvertido = $valorEmBRL / $cotacoes[$moedaDestino];
    
    return round($valorConvertido, 2);
}

function formatarTelefone($telefone) {
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    $tamanho = strlen($telefone);
    
    if ($tamanho == 10) {
        return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 4) . '-' . substr($telefone, 6, 4);
    } elseif ($tamanho == 11) {
        return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7, 4);
    } else {
        return $telefone;
    }
}

function gerarSaudacao() {
    $hora = date('H');
    
    if ($hora >= 5 && $hora < 12) {
        return 'Bom dia! 🌅';
    } elseif ($hora >= 12 && $hora < 18) {
        return 'Boa tarde! ☀️';
    } elseif ($hora >= 18 && $hora < 23) {
        return 'Boa noite! 🌙';
    } else {
        return 'Boa madrugada! 🌃';
    }
}

function validarSenhaForte($senha) {
    $erros = [];
    
    if (strlen($senha) < 8) {
        $erros[] = 'Mínimo 8 caracteres';
    }
    
    if (!preg_match('/[a-z]/', $senha)) {
        $erros[] = 'Letra minúscula';
    }
    
    if (!preg_match('/[A-Z]/', $senha)) {
        $erros[] = 'Letra maiúscula';
    }
    
    if (!preg_match('/[0-9]/', $senha)) {
        $erros[] = 'Número';
    }
    
    if (!preg_match('/[!@#$%&*]/', $senha)) {
        $erros[] = 'Caractere especial (!@#$%&*)';
    }
    
    return [
        'valida' => empty($erros),
        'erros' => $erros
    ];
}

function exibirFuncao($nome, $resultado) {
    echo "### " . $nome . " ###\n";
    print_r($resultado);
    echo "\n\n";
}

function exibirTitulo($titulo) {
    echo "========================================\n";
    echo "  " . $titulo . "\n";
    echo "========================================\n\n";
}

?>