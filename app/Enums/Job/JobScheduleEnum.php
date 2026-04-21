<?php

namespace App\Enums\Job;

enum JobScheduleEnum: string
{
    case FullTime = 'Full-time';
    case PartTime = 'Part-time';
    case Internship = 'Internship';

    public function label(): string
    {
        return match ($this) {
            self::FullTime => 'Full Time',
            self::PartTime => 'Part Time',
            self::Internship => 'Internship',
        };
    }

}
