<?php

function calcularSubtotal($produto) {
    return $produto['quantidade'] * $produto['valor_unitario'];
}

function calcularTotalCompra($produtos) {
    $total = 0;
    foreach ($produtos as $produto) {
        $total += calcularSubtotal($produto);
    }
    return $total;
}

function calcularDesconto($total) {
    if ($total > 1000) {
        return $total * 0.15;
    } elseif ($total > 500) {
        return $total * 0.10;
    }
    return 0;
}

function calcularFrete($total) {
    if ($total > 800) {
        return 0;
    } elseif ($total > 300) {
        return 20;
    }
    return 35;
}

function encontrarProdutoMaisCaro($produtos) {
    $maisCaro = $produtos[0];
    foreach ($produtos as $produto) {
        if ($produto['valor_unitario'] > $maisCaro['valor_unitario']) {
            $maisCaro = $produto;
        }
    }
    return $maisCaro;
}

function encontrarMaiorSubtotal($produtos) {
    $maior = $produtos[0];
    $maiorSubtotal = calcularSubtotal($produtos[0]);
    
    foreach ($produtos as $produto) {
        $subtotal = calcularSubtotal($produto);
        if ($subtotal > $maiorSubtotal) {
            $maior = $produto;
            $maiorSubtotal = $subtotal;
        }
    }
    return $maior;
}

function calcularQuantidadeTotalItens($produtos) {
    $total = 0;
    foreach ($produtos as $produto) {
        $total += $produto['quantidade'];
    }
    return $total;
}

function processarPedido($produtos) {
    if (empty($produtos)) {
        return ['erro' => 'Nenhum produto no pedido'];
    }
    
    $totalCompra = calcularTotalCompra($produtos);
    $desconto = calcularDesconto($totalCompra);
    $totalComDesconto = $totalCompra - $desconto;
    $frete = calcularFrete($totalComDesconto);
    $valorFinal = $totalComDesconto + $frete;
    
    $subtotais = [];
    foreach ($produtos as $produto) {
        $subtotais[] = [
            'nome' => $produto['nome'],
            'subtotal' => calcularSubtotal($produto)
        ];
    }
    
    $produtoMaisCaro = encontrarProdutoMaisCaro($produtos);
    $produtoMaiorSubtotal = encontrarMaiorSubtotal($produtos);
    $totalItens = calcularQuantidadeTotalItens($produtos);
    
    return [
        'produtos' => $produtos,
        'subtotais' => $subtotais,
        'quantidade_produtos_diferentes' => count($produtos),
        'quantidade_total_itens' => $totalItens,
        'produto_mais_caro' => $produtoMaisCaro,
        'produto_maior_subtotal' => $produtoMaiorSubtotal,
        'total_compra' => round($totalCompra, 2),
        'desconto_aplicado' => round($desconto, 2),
        'total_com_desconto' => round($totalComDesconto, 2),
        'frete' => round($frete, 2),
        'valor_final' => round($valorFinal, 2)
    ];
}

function exibirRelatorio($pedido) {
    if (isset($pedido['erro'])) {
        echo "ERRO: " . $pedido['erro'] . "\n\n";
        return;
    }
    
    echo "========================================\n";
    echo "   RELATORIO DE PROCESSAMENTO DE PEDIDO\n";
    echo "========================================\n\n";
    
    echo "PRODUTOS:\n";
    echo "----------------------------------------\n";
    foreach ($pedido['produtos'] as $produto) {
        $subtotal = $produto['quantidade'] * $produto['valor_unitario'];
        echo "  - " . $produto['nome'] . "\n";
        echo "    Quantidade: " . $produto['quantidade'] . "\n";
        echo "    Valor unitario: R$ " . number_format($produto['valor_unitario'], 2, ',', '.') . "\n";
        echo "    Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "\n\n";
    }
    
    echo "RESUMO DO PEDIDO:\n";
    echo "----------------------------------------\n";
    echo "  Total de produtos diferentes: " . $pedido['quantidade_produtos_diferentes'] . "\n";
    echo "  Total de itens comprados: " . $pedido['quantidade_total_itens'] . "\n\n";
    
    echo "DESTAQUES:\n";
    echo "----------------------------------------\n";
    echo "  Produto mais caro (unitario): " . $pedido['produto_mais_caro']['nome'] . " (R$ " . number_format($pedido['produto_mais_caro']['valor_unitario'], 2, ',', '.') . ")\n";
    echo "  Produto com maior subtotal: " . $pedido['produto_maior_subtotal']['nome'] . " (R$ " . number_format(calcularSubtotal($pedido['produto_maior_subtotal']), 2, ',', '.') . ")\n\n";
    
    echo "VALORES:\n";
    echo "----------------------------------------\n";
    echo "  Subtotal da compra: R$ " . number_format($pedido['total_compra'], 2, ',', '.') . "\n";
    echo "  Desconto aplicado: R$ " . number_format($pedido['desconto_aplicado'], 2, ',', '.') . "\n";
    echo "  Total com desconto: R$ " . number_format($pedido['total_com_desconto'], 2, ',', '.') . "\n";
    echo "  Frete: R$ " . number_format($pedido['frete'], 2, ',', '.') . "\n";
    echo "  --------------------------------------\n";
    echo "  VALOR FINAL: R$ " . number_format($pedido['valor_final'], 2, ',', '.') . "\n";
    
    echo "\n========================================\n\n";
}

$pedido1 = [
    ['nome' => 'Notebook Dell', 'quantidade' => 2, 'valor_unitario' => 3500.00],
    ['nome' => 'Mouse Logitech', 'quantidade' => 3, 'valor_unitario' => 150.00],
    ['nome' => 'Teclado Mecanico', 'quantidade' => 1, 'valor_unitario' => 400.00],
    ['nome' => 'Monitor 27"', 'quantidade' => 2, 'valor_unitario' => 1200.00]
];

$pedido2 = [
    ['nome' => 'Camiseta Basica', 'quantidade' => 5, 'valor_unitario' => 45.00],
    ['nome' => 'Calca Jeans', 'quantidade' => 3, 'valor_unitario' => 120.00],
    ['nome' => 'Ten esportivo', 'quantidade' => 2, 'valor_unitario' => 250.00]
];

$pedido3 = [
    ['nome' => 'Livro PHP', 'quantidade' => 10, 'valor_unitario' => 30.00],
    ['nome' => 'Caderno', 'quantidade' => 15, 'valor_unitario' => 12.00],
    ['nome' => 'Caneta', 'quantidade' => 20, 'valor_unitario' => 2.50]
];

$pedido4 = [
    ['nome' => 'Smartphone', 'quantidade' => 1, 'valor_unitario' => 2500.00],
    ['nome' => 'Fone Bluetooth', 'quantidade' => 2, 'valor_unitario' => 350.00],
    ['nome' => 'Carregador', 'quantidade' => 3, 'valor_unitario' => 80.00],
    ['nome' => 'Película', 'quantidade' => 5, 'valor_unitario' => 25.00]
];

$pedido5 = [];

echo "PROCESSANDO PEDIDOS...\n\n";

$relatorio1 = processarPedido($pedido1);
exibirRelatorio($relatorio1);

$relatorio2 = processarPedido($pedido2);
exibirRelatorio($relatorio2);

$relatorio3 = processarPedido($pedido3);
exibirRelatorio($relatorio3);

$relatorio4 = processarPedido($pedido4);
exibirRelatorio($relatorio4);

$relatorio5 = processarPedido($pedido5);
exibirRelatorio($relatorio5);

?>