<?php

namespace App\Utils;

use Carbon\Carbon;

class Helper
{
    public static function convertDateFormat(string $date, string $fromFormat = 'Y-m-d', string $toFormat = 'd/m/Y'): ?string
    {
        try {
            return Carbon::createFromFormat($fromFormat, $date)->format($toFormat);
        } catch (\Exception $e) {
            return null; // Retorna null se houver um erro na conversão
        }
    }
    public static function dataCurta(string $date): string
    {
        try {
            // Cria uma instância do Carbon a partir da data, considerando formatos comuns
            $carbonDate = Carbon::parse($date);
            // Formata a data no formato 'd/m/Y'
            return $carbonDate->format('d/m/Y');
        } catch (\Exception $e) {
            return 'Data inválida'; // Retorna uma mensagem padrão se a data for inválida
        }
    }

    public static function Moeda(float $valor, string $moeda = 'kz'): string
    {
        return number_format($valor, 2, ',', '.') . ' ' . $moeda;
    }

    public static function convertToSlug(string $string): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    public static function formatBytes(int $bytes): string
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public static function convertToBoolean(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public static function humanoData(string $date): string
    {
        $now = new \DateTime();
        $dateTime = new \DateTime($date);
        $interval = $now->diff($dateTime);

        $seconds = $interval->s;
        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->days;

        if ($interval->invert == 0) { // Data futura
            if ($days == 0) {
                if ($hours == 0) {
                    if ($minutes == 0) {
                        return $seconds <= 30 ? 'Agora mesmo' : "Em $seconds segundos";
                    }
                    return $minutes == 1 ? 'Em 1 minuto' : "Em $minutes minutos";
                }
                return $hours == 1 ? 'Em 1 hora' : "Em $hours horas";
            } elseif ($days == 1) {
                return 'Amanhã';
            } elseif ($days == 2) {
                return 'Daqui a 2 dias';
            } elseif ($days <= 7) {
                return 'Próxima semana';
            }
        } else { // Data passada
            if ($days == 0) {
                if ($hours == 0) {
                    if ($minutes == 0) {
                        return $seconds <= 30 ? 'Agora mesmo' : "Há $seconds segundos";
                    }
                    return $minutes == 1 ? 'Há 1 minuto' : "Há $minutes minutos";
                }
                return $hours == 1 ? 'Há 1 hora' : "Há $hours horas";
            } elseif ($days == 1) {
                return 'Ontem';
            } elseif ($days <= 7) {
                return $days == 1 ? 'Há 1 dia' : "Há $days dias";
            } elseif ($days <= 30) {
                return $days <= 14 ? "Há uma semana" : "+ de uma semana";
            } elseif ($days <= 60) {
                return 'Mês passado';
            } elseif ($days <= 365) {
                $months = round($days / 30);
                return "Há mais de $months meses";
            } else {
                $years = round($days / 365);
                return "Há mais de $years anos";
            }
        }

        return 'Data não especificada';
    }

    public static function limitarString(string $string, int $limit = 100, string $end = '...'): string
    {
        if (mb_strlen($string) <= $limit) {
            return $string;
        }

        return mb_substr($string, 0, $limit) . $end;
    }

    /**
     * Gera um UUID v4 (Universally Unique Identifier).
     *
     * @return string O UUID gerado.
     */
    public static function gerarUUID(): string
    {
        return (string) \Illuminate\Support\Str::uuid();
    }

    /**
     * Verifica se uma string é um endereço de e-mail válido.
     *
     * @param string $email O endereço de e-mail a ser verificado.
     * @return bool Retorna true se o e-mail for válido, false caso contrário.
     */
    public static function validarEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Gera uma senha aleatória com um comprimento especificado.
     *
     * @param int $comprimento O comprimento da senha gerada.
     * @return string A senha gerada.
     */
    public static function gerarSenha(int $comprimento = 12): string
    {
        return \Illuminate\Support\Str::random($comprimento);
    }
}
