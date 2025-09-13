<?php
namespace App\Enum;

enum LivreStatus: string
{
    case DISPONIBLE = 'disponible';
    case EMPRUNTE = 'emprunté';
    case RESERVE = 'indisponible';

    public function getLabel(): string
    {
        return match ($this) {
            self::DISPONIBLE => 'Disponible',
            self::EMPRUNTE => 'Emprunté',
            self::RESERVE => 'Indisponible',
        };
    }
}