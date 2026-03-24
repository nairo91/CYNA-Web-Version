<?php

namespace App\Enum;

enum PricingModel: string
{
    case MENSUEL = 'mensuel';
    case ANNUEL = 'annuel';
    case UTILISATEUR = 'utilisateur';
}
