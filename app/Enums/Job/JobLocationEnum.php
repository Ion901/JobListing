<?php

namespace App\Enums\Job;

enum JobLocationEnum: string
{
    case Office = 'Office';
    case Remote = 'Remote';
    case Hybrid = 'Hybrid';
    case Teren = 'In teren';
}
