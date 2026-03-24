<?php

namespace App\Enum;

enum OrderStatus: string
{
    case PAYE = 'paye';
    case EN_ATTENTE = 'en_attente';
    case ANNULE = 'annule';
}
