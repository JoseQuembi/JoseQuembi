<?php

namespace App\Utils;

use Carbon\Carbon;

class Helper
{
    /**
     * Converte uma data de um formato para outro.
     *
     * @param string $date A data a ser convertida.
     * @param string $fromFormat O formato atual da data.
     * @param string $toFormat O formato para o qual a data será convertida.
     * @return string|null A data convertida ou null se a conversão falhar.
     */
    public static function convertDateFormat(string $date, string $fromFormat = 'Y-m-d', string $toFormat = 'd/m/Y'): ?string
    {
        try {
            return Carbon::createFromFormat($fromFormat, $date)->format($toFormat);
        } catch (\Exception $e) {
            return null; // Retorna null se houver um erro na conversão
        }
    }

    /**
     * Converte uma string em formato slug.
     *
     * @param string $string A string a ser convertida.
     * @return string A string convertida para o formato slug.
     */
    public static function convertToSlug(string $string): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    /**
     * Converte uma quantidade de bytes em uma string legível para humanos (KB, MB, GB).
     *
     * @param int $bytes O número de bytes.
     * @return string A quantidade de bytes convertida em uma string legível.
     */
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

    /**
     * Converte uma string boolean para um valor booleano.
     *
     * @param string $value A string a ser convertida ('true', 'false', '1', '0').
     * @return bool O valor booleano correspondente.
     */
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
}
