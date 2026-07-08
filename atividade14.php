<?php

function estatisticasNumericas($numeros) {
    if (empty($numeros)) {
        return [
            'erro' => 'Nenhum número fornecido'
        ];
    }
    
    $soma = array_sum($numeros);
    $quantidade = count($numeros);
    $media = $soma / $quantidade;
    $maior = max($numeros);
    $menor = min($numeros);
    
    $numerosOrdenados = $numeros;
    sort($numerosOrdenados);
    
    if ($quantidade % 2 == 0) {
        $posicao1 = $quantidade / 2 - 1;
        $posicao2 = $quantidade / 2;
        $mediana = ($numerosOrdenados[$posicao1] + $numerosOrdenados[$posicao2]) / 2;
    } else {
        $posicao = floor($quantidade / 2);
        $mediana = $numerosOrdenados[$posicao];
    }
    
    $pares = 0;
    $impares = 0;
    
    foreach ($numeros as $numero) {
        if ($numero % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
    }
    
    return [
        'soma' => $soma,
        'media' => round($media, 2),
        'maior' => $maior,
        'menor' => $menor,
        'mediana' => $mediana,
        'pares' => $pares,
        'impares' => $impares,
        'quantidade' => $quantidade
    ];
}

function exibirEstatisticas($numeros) {
    $resultado = estatisticasNumericas($numeros);
    
    if (isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'] . "\n\n";
        return;
    }
    
    echo "=== ESTATÍSTICAS NUMÉRICAS ===\n";
    echo "Números: " . implode(', ', $numeros) . "\n";
    echo "├─ Soma: " . $resultado['soma'] . "\n";
    echo "├─ Média: " . $resultado['media'] . "\n";
    echo "├─ Maior valor: " . $resultado['maior'] . "\n";
    echo "├─ Menor valor: " . $resultado['menor'] . "\n";
    echo "├─ Mediana: " . $resultado['mediana'] . "\n";
    echo "├─ Quantidade de pares: " . $resultado['pares'] . "\n";
    echo "├─ Quantidade de ímpares: " . $resultado['impares'] . "\n";
    echo "└─ Total de números: " . $resultado['quantidade'] . "\n\n";
}

exibirEstatisticas([10, 20, 30, 40, 50]);
exibirEstatisticas([5, 15, 25, 35, 45, 55]);
exibirEstatisticas([3, 7, 2, 9, 11, 6, 8]);
exibirEstatisticas([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
exibirEstatisticas([]);

?>