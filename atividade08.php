<?php

function ordenarNomes($listaNomes) {
    $nomes = explode(',', $listaNomes);
    $nomes = array_map('trim', $nomes);
    $nomes = array_filter($nomes, function($nome) {
        return !empty($nome);
    });
    
    sort($nomes);
    return $nomes;
}

$alunos = "João, Maria, Pedro, Ana, Carlos";
$resultado1 = ordenarNomes($alunos);
echo "Lista original: " . $alunos . "\n";
echo "Lista organizada: " . implode(', ', $resultado1) . "\n\n";
$alunos2 = "  João  ,  Maria  ,  Pedro  ,  Ana  ,  Carlos  ";
$resultado2 = ordenarNomes($alunos2);
echo "Lista original: " . $alunos2 . "\n";
echo "Lista organizada: " . implode(', ', $resultado2) . "\n\n";

$alunos3 = "joão, MARIA, pedro, ANA, carlos";
$resultado3 = ordenarNomes($alunos3);
echo "Lista original: " . $alunos3 . "\n";
echo "Lista organizada: " . implode(', ', $resultado3) . "\n\n";

$alunos4 = "João,, Maria, Pedro,,, Ana, Carlos";
$resultado4 = ordenarNomes($alunos4);
echo "Lista original: " . $alunos4 . "\n";
echo "Lista organizada: " . implode(', ', $resultado4) . "\n\n";

?>
