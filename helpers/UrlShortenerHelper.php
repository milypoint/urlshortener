<?php

namespace app\helpers;

/**
 * Class UrlShortenerHelper
 * @package app\helpers
 */
class UrlShortenerHelper
{
    const code_set="QybVileI4aZC7PMk9v85EcA0GS63oOqfKLmpJurNHstYhgBdjTUxWD2FRw1znX";

    /**
     * @param int $n
     * @return string
     */
    public static function idToCode($n)
    {
        $code_set = self::code_set;
        $base = strlen($code_set);
        $converted = "";

        while ($n > 0) {
            $converted = substr($code_set, ($n % $base), 1) . $converted;
            $n = floor($n/$base);
        }
        return $converted;
    }

    /**
     * @param string $converted
     * @return int
     */
    public static function codeToId($converted)
    {
        $code_set = self::code_set;
        $base = strlen($code_set);
        $c = 0;
        for ($i = strlen($converted); $i; $i--) {
            $c += strpos($code_set, substr($converted, (-1 * ( $i - strlen($converted) )),1))
                * pow($base,$i-1);
        }
        return $c;
    }
}
