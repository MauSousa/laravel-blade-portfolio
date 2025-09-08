<?php

declare(strict_types=1);

namespace App\Enum;

enum ProjectStatusEnum: int
{
    case DRAFTED = 0;
    case PUBLISHED = 1;

    public function label(): string
    {
        return match ($this) {
            self::DRAFTED => 'Drafted',
            self::PUBLISHED => 'Published',
        };
    }
}
