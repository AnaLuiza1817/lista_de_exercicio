<?php

function analisarProdutos($produtos) {
    if (empty($produtos)) {
        return [
            'erro' => 'Nenhum produto fornecido'
        ];
    }
    
    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $somaPrecos = 0;
    
    foreach ($produtos as $produto) {
        $somaPrecos += $produto['preco'];
        
        if ($produto['preco'] > $maisCaro['preco']) {
            $maisCaro = $produto;
        }
        
        if ($produto['preco'] < $maisBarato['preco']) {
            $maisBarato = $produto;
        }
    }
    
    $media = $somaPrecos / count($produtos);
    
    return [
        'produtos' => $produtos,
        'mais_caro' => $maisCaro,
        'mais_barato' => $maisBarato,
        'media_precos' => round($media, 2)
    ];
}

function pesquisarProduto($produtos, $nome) {
    $resultados = [];
    
    foreach ($produtos as $produto) {
        if (stripos($produto['nome'], $nome) !== false) {
            $resultados[] = $produto;
        }
    }
    
    return $resultados;
}

function exibirAnaliseProdutos($produtos) {
    $resultado = analisarProdutos($produtos);
    
    if (isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'] . "\n\n";
        return;
    }
    
    echo "=== CATÁLOGO DE PRODUTOS ===\n";
    echo "Lista de produtos:\n";
    foreach ($resultado['produtos'] as $produto) {
        echo "  - " . $produto['nome'] . ": R$ " . number_format($produto['preco'], 2, ',', '.') . "\n";
    }
    echo "\n";
    echo "├─ Produto mais caro: " . $resultado['mais_caro']['nome'] . " (R$ " . number_format($resultado['mais_caro']['preco'], 2, ',', '.') . ")\n";
    echo "├─ Produto mais barato: " . $resultado['mais_barato']['nome'] . " (R$ " . number_format($resultado['mais_barato']['preco'], 2, ',', '.') . ")\n";
    echo "└─ Média dos preços: R$ " . number_format($resultado['media_precos'], 2, ',', '.') . "\n\n";
}

function exibirPesquisa($produtos, $termo) {
    $resultados = pesquisarProduto($produtos, $termo);
    
    echo "=== PESQUISA POR: '" . $termo . "' ===\n";
    if (empty($resultados)) {
        echo "Nenhum produto encontrado.\n\n";
    } else {
        echo "Produtos encontrados:\n";
        foreach ($resultados as $produto) {
            echo "  - " . $produto['nome'] . ": R$ " . number_format($produto['preco'], 2, ',', '.') . "\n";
        }
        echo "\n";
    }
}

$produtos = [
    ['nome' => 'Arroz', 'preco' => 25.90],
    ['nome' => 'Feijão', 'preco' => 8.50],
    ['nome' => 'Macarrão', 'preco' => 4.75],
    ['nome' => 'Café', 'preco' => 15.30],
    ['nome' => 'Açúcar', 'preco' => 6.20],
    ['nome' => 'Óleo', 'preco' => 9.90],
    ['nome' => 'Leite', 'preco' => 7.50],
    ['nome' => 'Pão', 'preco' => 12.00]
];

exibirAnaliseProdutos($produtos);

exibirPesquisa($produtos, 'arroz');
exibirPesquisa($produtos, 'leite');
exibirPesquisa($produtos, 'carne');

?>