<?php

function mascararCpf($cpf) {
    $cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
    
    if (strlen($cpfLimpo) !== 11) {
        return "CPF inválido!";
    }
    
    $ultimosQuatro = substr($cpfLimpo, -4);
    
    $cpfMascarado = str_repeat('*', 11);
    $cpfMascarado = substr_replace($cpfMascarado, $ultimosQuatro, -4);
    
    $cpfFormatado = substr($cpfMascarado, 0, 3) . '.' .
                    substr($cpfMascarado, 3, 3) . '.' .
                    substr($cpfMascarado, 6, 3) . '-' .
                    substr($cpfMascarado, 9, 2);
    
    return $cpfFormatado;
}

$cpf = "123.456.789-09";
echo "CPF original: $cpf<br>";
echo "CPF mascarado: " . mascararCpf($cpf);

?>