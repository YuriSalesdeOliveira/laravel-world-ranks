<?php

namespace App\Enums;

use App\Enums\Traits\UtilitiesTrait;

enum CountryStatusEnum: string
{
    use UtilitiesTrait;

    case MEMBER_OF_THE_UNITED_NATIONS = 'Member of the United Nations';
    case INDEPENDENT = 'Independent';
}
