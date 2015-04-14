<?php

final class Util {

    /**
     * Indica se uma string é menor ou igual ao tamnho passado
     * @param string $texto a string a ser testada
     * @param int $tamanho o tamnho máximo da string
     * @return boolean
     */
    static public function isTamanhoOK($texto, $tamanho) {
        return (strlen($texto) <= $tamanho);
    }

    static public function isTamanhoExato($texto, $tamanho) {
        return (strlen($texto) == $tamanho);
    }

    static public function trunca($texto, $tamanho) {
        if (Util::isTamanhoOK($texto, $tamanho))
            return $texto;
        return substr($texto, 0, $tamanho);
    }

    static public function isTelefone($valor, $comDDD) {
        if ($comDDD) {
            return preg_match("/^\([123456789]\d\)\d{4}\-\d{4}$/", $valor);
        }
        return preg_match("/^\d{4}\-\d{4}$/", $valor);
    }

    static function isHora($valor) {
        return preg_match("/^([01]\d|2[123]):[012345]\d$/", $valor);
    }

    static function isCPF($valor) {
        if (preg_match("/^\d{3}[\.]?\d{3}[\.]?\d{3}[\-]?\d{2}$/", $valor)) {
            //$sem_traco_e_ponto = preg_replace(array(".", "-"), "", $valor);
            return !preg_match("/^0{11}$|^1{11}$|^2{11}$|^3{11}$|^4{11}$|^5{11}$|^6{11}$|^7{11}$|^8{11}$|^9{11}$/", $valor);
        }
        return false;
    }

    static function isCNPJ($valor) {
        return preg_match("/^\d{2}[\.]?\d{3}[\.]?\d{3}[\/]?\d{4}[\-]?\d{2}$/", $valor);
    }

    static function isCEP($valor) {
        return preg_match("/^[\d]{8}$|^[\d]{5}-[\d]{3}/", $valor);
    }

    static function isEmail($valor) {
        return preg_match("/[A-Za-z0-9_\.\-]+@([A-Za-z0-9_\-]+\.)+[A-Za-z]{2,4}/", $valor);
    }

    function newDate($year, $month, $day, $timezone = NULL) {
        if ($timezone == null)
            $timezone = new DateTimeZone('America/Sao_Paulo');
        try {
            return new DateTime("$year-$month-$day", $timezone);
        } catch (Exception $e) {
            return NULL;
        }
    }

    static function isDateOK($year, $month, $day, $timezone = NULL) {
        return (Util::newDate($year, $month, $day, $timezone) != NULL);
    }

    static function isParsedDateOK($stringDateToCheck, $timezone = NULL) {
        if (preg_match("/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[012])\/(\d{4})$/", $stringDateToCheck, $matches)) {
            return Util::isDateOK($matches[3], $matches[2], $matches[1], $timezone);
        }
        return false;
    }

    static function newDate_Parse($dateAsString, $timezone = NULL) {
        if (preg_match("/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[012])\/(\d{4})$/", $dateAsString, $matches)) {
            return Util::newDate_Parse($matches[3], $matches[2], $matches[1], $timezone);
        }
        return NULL;
    }

    static function protect($sql) {
        $codes = array("from", "select", "insert", "delete", "where", "drop", "table", "show tables", "truncate", "union",
            "FROM", "SELECT", "INSERT", "DELETE", "WHERE", "DROP", "TABLE", "SHOW TABLES", "TRUNCATE", "UNION",
            "#", "*", "'", "%", "or '1='1", "or 11", "OR '1='1", "=", "OR 11", "--");
        $string = str_replace($codes, "", $sql);
        //return clean string
        return trim($string);
    }

    function upper($str) {
        $LATIN_UC_CHARS = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ°°ª";
        $LATIN_LC_CHARS = "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý°ºª";
        $str = strtr($str, $LATIN_LC_CHARS, $LATIN_UC_CHARS);
        $str = strtoupper($str);
        return $str;
    }

    public function limitaPalavras($string, $word_limit) {
        $words = explode(' ', $string);
        return implode(' ', array_slice($words, 0, $word_limit));
    }

    function limitaTexto($texto, $tamanho) {
        return strlen($texto) > $tamanho ? substr($texto, 0, $tamanho) : $texto;
    }

    function _mes($m) {
        switch ($m) {
            case 1: $month_text = "Jan";
                break;
            case 2: $month_text = "Feb";
                break;
            case 3: $month_text = "Mar";
                break;
            case 4: $month_text = "Abr";
                break;
            case 5: $month_text = "Mai";
                break;
            case 6: $month_text = "Jun";
                break;
            case 7: $month_text = "Jul";
                break;
            case 8: $month_text = "Ago";
                break;
            case 9: $month_text = "Set";
                break;
            case 10: $month_text = "Out";
                break;
            case 11: $month_text = "Nov";
                break;
            case 12: $month_text = "Dez";
                break;
        }
        return ($month_text);
    }

    function map($str) {
        $map = array(
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C',
        );
        $novo =  str_replace($map, $map, $str);
        return $novo;
    }

}

?>
