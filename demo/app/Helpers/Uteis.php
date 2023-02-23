<?php
if (! function_exists('validateCpf')) {
    function validateCpf($cpf) {
        // Remove caracteres especiais do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF possui 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (10 - $i) * $cpf[$i];
        }
        $digit1 = ($sum % 11 < 2) ? 0 : 11 - ($sum % 11);

        // Verifica o primeiro dígito verificador
        if ($cpf[9] != $digit1) {
            return false;
        }

        // Calcula o segundo dígito verificador
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += (11 - $i) * $cpf[$i];
        }
        $digit2 = ($sum % 11 < 2) ? 0 : 11 - ($sum % 11);

        // Verifica o segundo dígito verificador
        if ($cpf[10] != $digit2) {
            return false;
        }

        // CPF válido
        return true;
    }
}