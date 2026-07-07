<?php

function analisarTexto($texto) {
    
    $texto = trim($texto);
    $totalCaracteres = strlen($texto);
    $palavras = str_word_count($texto, 0);
    $vogais = 0;
    $consoantes = 0;
    $textoMinusculo = strtolower($texto);
    $vogaisLista = ['a', 'á', 'à', 'ã', 'â', 'e', 'é', 'è', 'ê', 'i', 'í', 'ì', 'î', 'o', 'ó', 'ò', 'õ', 'ô', 'u', 'ú', 'ù', 'û'];

    for ($i = 0; $i < $totalCaracteres; $i++) {
        $caractere = $textoMinusculo[$i];
        
        if (preg_match('/[a-záàãâéèêíìîóòõôúùû]/', $caractere)) {
    
            if (in_array($caractere, $vogaisLista)) {
                $vogais++;
            } else {
                $consoantes++;
            }
        }
    }
    

    return [
        'palavras' => $palavras,
        'caracteres' => $totalCaracteres,
        'vogais' => $vogais,
        'consoantes' => $consoantes
    ];
}

$texto = "Olá, mundo! Este é um teste.";
$resultado = analisarTexto($texto);

echo "Texto: \"$texto\"<br>";
echo "Palavras: " . $resultado['palavras'] . "<br>";
echo "Caracteres: " . $resultado['caracteres'] . "<br>";
echo "Vogais: " . $resultado['vogais'] . "<br>";
echo "Consoantes: " . $resultado['consoantes'] . "<br>";

?>