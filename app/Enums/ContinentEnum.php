<?php

namespace App\Enums;

use App\Enums\Traits\UtilitiesTrait;

enum ContinentEnum: string
{
    use UtilitiesTrait;

    case ASIA = 'Asia';
    case AFRICA = 'Africa';
    case EUROPE = 'Europe';
    case NORTH_AMERICA = 'North America';
    case SOUTH_AMERICA = 'South America';
    case OCEANIA = 'Oceania';
    case ANTARCTICA = 'Antarctica';
}
