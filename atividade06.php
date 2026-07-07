<?php

function converterTemperatura($valor, $origem, $destino) {
    $origem = strtoupper($origem);
    $destino = strtoupper($destino);
    
    $escalasValidas = ['C', 'F', 'K'];
    if (!in_array($origem, $escalasValidas) || !in_array($destino, $escalasValidas)) {
        return "Escala inválida! Use C (Celsius), F (Fahrenheit) ou K (Kelvin).";
    }
    
    if ($origem === $destino) {
        return $valor;
    }
    

    switch ($origem) {
        case 'C':
            $emCelsius = $valor;
            break;
        case 'F':
            $emCelsius = ($valor - 32) * 5 / 9;
            break;
        case 'K':
            $emCelsius = $valor - 273.15;
            break;
    }
    
    switch ($destino) {
        case 'C':
            $resultado = $emCelsius;
            break;
        case 'F':
            $resultado = $emCelsius * 9 / 5 + 32;
            break;
        case 'K':
            $resultado = $emCelsius + 273.15;
            break;
    }
    
    return round($resultado, 2);
}

echo "25°C para Fahrenheit: " . converterTemperatura(25, 'C', 'F') . "°F<br>";
echo "100°C para Kelvin: " . converterTemperatura(100, 'C', 'K') . "K<br>";
echo "98.6°F para Celsius: " . converterTemperatura(98.6, 'F', 'C') . "°C<br>";
echo "300K para Celsius: " . converterTemperatura(300, 'K', 'C') . "°C<br>";
echo "32°F para Kelvin: " . converterTemperatura(32, 'F', 'K') . "K<br>";

?>