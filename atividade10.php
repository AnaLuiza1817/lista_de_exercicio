<?php

function calcularMedia($notas) {
    if (empty($notas)) {
        return [
            'erro' => 'Nenhuma nota fornecida'
        ];
    }
    
    $maiorNota = max($notas);
    $menorNota = min($notas);
    
    $soma = array_sum($notas);
    $quantidade = count($notas);
    $media = $soma / $quantidade;
    
    $situacao = definirSituacao($media);
    
    return [
        'notas' => $notas,
        'maior_nota' => $maiorNota,
        'menor_nota' => $menorNota,
        'media' => round($media, 2),
        'situacao' => $situacao
    ];
}

function definirSituacao($media) {
    if ($media >= 7.0) {
        return 'Aprovado ';
    } elseif ($media >= 5.0) {
        return 'Recuperação ';
    } else {
        return 'Reprovado ';
    }
}

function exibirResultado($notas) {
    $resultado = calcularMedia($notas);
    
    if (isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'] . "\n\n";
        return;
    }
    
    echo "=== BOLETIM DO ALUNO ===\n";
    echo "Notas: " . implode(', ', $resultado['notas']) . "\n";
    echo "├─ Maior nota: " . $resultado['maior_nota'] . "\n";
    echo "├─ Menor nota: " . $resultado['menor_nota'] . "\n";
    echo "├─ Média: " . $resultado['media'] . "\n";
    echo "└─ Situação: " . $resultado['situacao'] . "\n\n";
}

exibirResultado([8.5, 7.0, 9.0, 8.0]);
exibirResultado([6.0, 5.5, 7.0, 6.5]);
exibirResultado([4.0, 3.5, 5.0, 4.5]);
exibirResultado([10, 9, 10, 9.5]);
exibirResultado([0, 10, 5, 3]);
exibirResultado([7.0, 7.0, 7.0, 7.0]);
exibirResultado([]);

?>