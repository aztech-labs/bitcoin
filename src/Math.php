<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 15/11/14
 * Time: 18:31
 */

namespace Bitcoin;

class Math {

    /**
     * @var \Mdanter\Ecc\MathAdater
     */
    private static $adapter;

    /**
     * @param \Mdanter\Ecc\MathAdapter $math
     */
    public static function setAdapter(\Mdanter\Ecc\MathAdapter $math)
    {
        self::$adapter = $math;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (is_null(static::$adapter)) {
            static::$adapter = Bitcoin::getMath();
        }

        return call_user_func_array(array(static::$adapter, $name), $arguments);
    }

    /**
     * Similar to gmp_div_qr, return a tuple containing the
     * result and the remainder
     *
     * @param $dividend
     * @param $divisor
     * @return array
     */
    public static function div_qr($dividend, $divisor)
    {
        // $div = n / q
        $div = Math::div($dividend, $divisor);
        // $remainder = n - (n / q) * q
        $remainder = Math::sub($dividend, Math::mul($div, $divisor));
        return array($div, $remainder);
    }
}