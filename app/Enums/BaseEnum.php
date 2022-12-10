<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

abstract class BaseEnum extends Enum
{
    abstract public static function asList(): array;

    public static function getDescription($value): string
    {
        return self::asList()[$value];
    }
    public static function getValueByName($name)
    {
        return array_search(self::asList(), $name);
    }
}
