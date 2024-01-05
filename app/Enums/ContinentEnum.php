<?php

namespace App\Enums;

enum ContinentEnum: string
{
    case Asia = 'Asia';
    case Africa = 'Africa';
    case Europe = 'Europe';
    case NorthAmerica = 'North America';
    case SouthAmerica = 'South America';
    case Oceania = 'Oceania';
    case Antarctica = 'Antarctica';

    public static function values(): array
    {
        return array_map(fn ($continentEnum) => $continentEnum->value, self::cases());
    }
}
