<?php

namespace App\Enums\Traits;

trait UtilitiesTrait
{
    public static function values(): array
    {
        return array_map(fn ($enum) => $enum->value, self::cases());
    }
}
