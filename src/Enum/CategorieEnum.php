<?php

namespace App\Enum;

enum CategorieEnum: string
{
    case ROMAN = 'roman';
    case POLICIER = 'policier';
    case SCIENCE_FICTION = 'science-fiction';
    case FANTAISIE = 'fantaisie';
    case BIOGRAPHIE = 'biographie';
    case HISTOIRE = 'histoire';
    case MANGA = 'manga';
    case BANDE_DESSINEE = 'bande-dessinee';
    case JEUNESSE = 'jeunesse';
    case ESSAI = 'essai';
    case THEATRE = 'theatre';
    case POESIE = 'poesie';
    case INFORMATIQUE = 'informatique';
    case CUISINE = 'cuisine';
    case VOYAGE = 'voyage';

    public function getLabel(): string
    {
        return match ($this) {
            self::ROMAN => 'Roman',
            self::POLICIER => 'Policier',
            self::SCIENCE_FICTION => 'Science-Fiction',
            self::FANTAISIE => 'Fantaisie',
            self::BIOGRAPHIE => 'Biographie',
            self::HISTOIRE => 'Histoire',
            self::MANGA => 'Manga',
            self::BANDE_DESSINEE => 'Bande Dessinée',
            self::JEUNESSE => 'Jeunesse',
            self::ESSAI => 'Essai',
            self::THEATRE => 'Théâtre',
            self::POESIE => 'Poésie',
            self::INFORMATIQUE => 'Informatique',
            self::CUISINE => 'Cuisine',
            self::VOYAGE => 'Voyage',
        };
    }
}
