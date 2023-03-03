<?php

namespace App\Enums;

enum LeaveStatus: string
{
    case  ENATTENTE = "en attente";
    case  APPROUVE = "approuvé";
    case  REFUSE = "refusé";
}
