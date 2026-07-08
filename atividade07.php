<?php

function calcularDesconto($valorTotal) {
    $desconto = 0;
    $percentual = 0;
    
    if ($valorTotal > 1000) {
        $percentual = 30;
    } elseif ($valorTotal > 500) {
        $percentual = 20;
    } elseif ($valorTotal > 100) {
        $percentual = 10;
    } else {
        $percentual = 0;
    }
   
    $desconto = $valorTotal * ($percentual / 100);

    $valorFinal = $valorTotal - $desconto;
    
    return [
        'valor_original' => $valorTotal,
        'percentual' => $percentual . '%',
        'desconto' => $desconto,
        'valor_final' => $valorFinal
    ];
}

$resultado1 = calcularDesconto(50);
echo "Compra de R$ 50,00:\n";
echo "Valor original: R$ " . number_format($resultado1['valor_original'], 2, ',', '.') . "\n";
echo "Desconto: " . $resultado1['percentual'] . " (R$ " . number_format($resultado1['desconto'], 2, ',', '.') . ")\n";
echo "Valor final: R$ " . number_format($resultado1['valor_final'], 2, ',', '.') . "\n\n";

$resultado2 = calcularDesconto(200);
echo "Compra de R$ 200,00:\n";
echo "Valor original: R$ " . number_format($resultado2['valor_original'], 2, ',', '.') . "\n";
echo "Desconto: " . $resultado2['percentual'] . " (R$ " . number_format($resultado2['desconto'], 2, ',', '.') . ")\n";
echo "Valor final: R$ " . number_format($resultado2['valor_final'], 2, ',', '.') . "\n\n";

$resultado3 = calcularDesconto(700);
echo "Compra de R$ 700,00:\n";
echo "Valor original: R$ " . number_format($resultado3['valor_original'], 2, ',', '.') . "\n";
echo "Desconto: " . $resultado3['percentual'] . " (R$ " . number_format($resultado3['desconto'], 2, ',', '.') . ")\n";
echo "Valor final: R$ " . number_format($resultado3['valor_final'], 2, ',', '.') . "\n\n";

$resultado4 = calcularDesconto(1500);
echo "Compra de R$ 1500,00:\n";
echo "Valor original: R$ " . number_format($resultado4['valor_original'], 2, ',', '.') . "\n";
echo "Desconto: " . $resultado4['percentual'] . " (R$ " . number_format($resultado4['desconto'], 2, ',', '.') . ")\n";
echo "Valor final: R$ " . number_format($resultado4['valor_final'], 2, ',', '.') . "\n";

?>