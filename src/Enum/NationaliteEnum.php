<?php

namespace App\Enum;


enum NationaliteEnum: string
{

    case ALGERIA                           = 'Algérie';
    case ANGOLA                            = 'Angola';
    case BENIN                             = 'Bénin';
    case BOTSWANA                          = 'Botswana';
    case BURKINA_FASO                      = 'Burkina Faso';
    case BURUNDI                           = 'Burundi';
    case CAMEROON                          = 'Cameroun';
    case CAPE_VERDE                        = 'Cap-Vert';
    case CENTRAL_AFRICAN_REPUBLIC          = 'République centrafricaine';
    case CHAD                              = 'Tchad';
    case COMOROS                           = 'Comores';
    case CONGO                             = 'Congo';
    case DR_CONGO                          = 'République démocratique du Congo';
    case COTE_DIVOIRE                      = 'Côte d\'Ivoire';
    case DJIBOUTI                          = 'Djibouti';
    case EGYPT                             = 'Égypte';
    case EQUATORIAL_GUINEA                 = 'Guinée équatoriale';
    case ERITREA                           = 'Érythrée';
    case ESWATINI                          = 'Eswatini';
    case ETHIOPIA                          = 'Éthiopie';
    case GABON                             = 'Gabon';
    case GAMBIA                            = 'Gambie';
    case GHANA                             = 'Ghana';
    case GUINEA                            = 'Guinée';
    case GUINEA_BISSAU                     = 'Guinée-Bissau';
    case KENYA                             = 'Kenya';
    case LESOTHO                           = 'Lesotho';
    case LIBERIA                           = 'Libéria';
    case LIBYA                             = 'Libye';
    case MADAGASCAR                        = 'Madagascar';
    case MALAWI                            = 'Malawi';
    case MALI                              = 'Mali';
    case MAURITANIA                        = 'Mauritanie';
    case MAURITIUS                         = 'Maurice';
    case MOROCCO                           = 'Maroc';
    case MOZAMBIQUE                        = 'Mozambique';
    case NAMIBIA                           = 'Namibie';
    case NIGER                             = 'Niger';
    case NIGERIA                           = 'Nigéria';
    case RWANDA                            = 'Rwanda';

    // --- EUROPE (30) ---
    case FRANCE                            = 'France';
    case GERMANY                           = 'Allemagne';
    case UNITED_KINGDOM                    = 'Royaume-Uni';
    case ITALY                             = 'Italie';
    case SPAIN                             = 'Espagne';
    case PORTUGAL                          = 'Portugal';
    case BELGIUM                           = 'Belgique';
    case NETHERLANDS                       = 'Pays-Bas';
    case LUXEMBOURG                        = 'Luxembourg';
    case SWITZERLAND                       = 'Suisse';
    case AUSTRIA                           = 'Autriche';
    case SWEDEN                            = 'Suède';
    case NORWAY                            = 'Norvège';
    case DENMARK                           = 'Danemark';
    case FINLAND                           = 'Finlande';
    case IRELAND                           = 'Irlande';
    case POLAND                            = 'Pologne';
    case CZECH_REPUBLIC                    = 'République tchèque';
    case SLOVAKIA                          = 'Slovaquie';
    case HUNGARY                           = 'Hongrie';
    case ROMANIA                           = 'Roumanie';
    case BULGARIA                          = 'Bulgarie';
    case GREECE                            = 'Grèce';
    case TURKEY                            = 'Turquie';
    case SERBIA                            = 'Serbie';
    case CROATIA                           = 'Croatie';
    case SLOVENIA                          = 'Slovénie';
    case ESTONIA                           = 'Estonie';
    case LATVIA                            = 'Lettonie';
    case LITHUANIA                         = 'Lituanie';

    // --- ASIE (20) ---
    case CHINA                             = 'Chine';
    case INDIA                             = 'Inde';
    case JAPAN                             = 'Japon';
    case SOUTH_KOREA                       = 'Corée du Sud';
    case NORTH_KOREA                       = 'Corée du Nord';
    case INDONESIA                         = 'Indonésie';
    case MALAYSIA                          = 'Malaisie';
    case PHILIPPINES                       = 'Philippines';
    case THAILAND                          = 'Thaïlande';
    case VIETNAM                           = 'Vietnam';
    case SINGAPORE                         = 'Singapour';
    case BANGLADESH                        = 'Bangladesh';
    case PAKISTAN                          = 'Pakistan';
    case SRI_LANKA                         = 'Sri Lanka';
    case NEPAL                             = 'Népal';
    case MONGOLIA                          = 'Mongolie';
    case KAZAKHSTAN                        = 'Kazakhstan';
    case UZBEKISTAN                        = 'Ouzbékistan';
    case TAIWAN                            = 'Taïwan';
    case ISRAEL                            = 'Israël';

    // --- OCÉANIE (10) ---
    case AUSTRALIA                         = 'Australie';
    case NEW_ZEALAND                       = 'Nouvelle-Zélande';
    case PAPUA_NEW_GUINEA                  = 'Papouasie-Nouvelle-Guinée';
    case FIJI                              = 'Fidji';
    case SOLOMON_ISLANDS                   = 'Îles Salomon';
    case VANUATU                           = 'Vanuatu';
    case SAMOA                             = 'Samoa';
    case TONGA                             = 'Tonga';
    case MICRONESIA                        = 'Micronésie';
    case PALAU                             = 'Palaos';

    public function getLabel(): string
    {

        return match($this) {
            self::ALGERIA                           => 'Algérie',
            self::ANGOLA                            => 'Angola',
            self::BENIN                             => 'Bénin',
            self::BOTSWANA                          => 'Botswana',
            self::BURKINA_FASO                      => 'Burkina Faso',
            self::BURUNDI                           => 'Burundi',
            self::CAMEROON                          => 'Cameroun',
            self::CAPE_VERDE                        => 'Cap-Vert',
            self::CENTRAL_AFRICAN_REPUBLIC          => 'République centrafricaine',
            self::CHAD                              => 'Tchad',
            self::COMOROS                           => 'Comores',
            self::CONGO                             => 'Congo',
            self::DR_CONGO                          => 'République démocratique du Congo',
            self::COTE_DIVOIRE                      => 'Côte d\'Ivoire',
            self::DJIBOUTI                          => 'Djibouti',
            self::EGYPT                             => 'Égypte',
            self::EQUATORIAL_GUINEA                 => 'Guinée équatoriale',
            self::ERITREA                           => 'Érythrée',
            self::ESWATINI                          => 'Eswatini',
            self::ETHIOPIA                          => 'Éthiopie',
            self::GABON                             => 'Gabon',
            self::GAMBIA                            => 'Gambie',
            self::GHANA                             => 'Ghana',
            self::GUINEA                            => 'Guinée',
            self::GUINEA_BISSAU                     => 'Guinée-Bissau',
            self::KENYA                             => 'Kenya',
            self::LESOTHO                           => 'Lesotho',
            self::LIBERIA                           => 'Libéria',
            self::LIBYA                             => 'Libye',
            self::MADAGASCAR                        => 'Madagascar',
            self::MALAWI                            => 'Malawi',
            self::MALI                              => 'Mali',
            self::MAURITANIA                        => 'Mauritanie',
            self::MAURITIUS                         => 'Maurice',
            self::MOROCCO                           => 'Maroc',
            self::MOZAMBIQUE                        => 'Mozambique',
            self::NAMIBIA                           => 'Namibie',
            self::NIGER                             => 'Niger',
            self::NIGERIA                           => 'Nigéria',
            self::RWANDA                            => 'Rwanda',
            self::FRANCE                            => 'France',
            self::GERMANY                           => 'Allemagne',
            self::UNITED_KINGDOM                    => 'Royaume-Uni',
            self::ITALY                             => 'Italie',
            self::SPAIN                             => 'Espagne',   
            self::PORTUGAL                          => 'Portugal',
            self::BELGIUM                           => 'Belgique',
            self::NETHERLANDS                       => 'Pays-Bas',  
            self::LUXEMBOURG                        => 'Luxembourg',
            self::SWITZERLAND                       => 'Suisse',
            self::AUSTRIA                           => 'Autriche',
            self::SWEDEN                            => 'Suède',
            self::NORWAY                            => 'Norvège',
            self::DENMARK                           => 'Danemark',
            self::FINLAND                           => 'Finlande',
            self::IRELAND                           => 'Irlande',
            self::POLAND                            => 'Pologne',
            self::CZECH_REPUBLIC                    => 'République tchèque',
            self::SLOVAKIA                          => 'Slovaquie',
            self::HUNGARY                           => 'Hongrie',
            self::ROMANIA                           => 'Roumanie',
            self::BULGARIA                          => 'Bulgarie',
            self::GREECE                            => 'Grèce',
            self::TURKEY                            => 'Turquie',
            self::SERBIA                            => 'Serbie',
            self::CROATIA                           => 'Croatie',
            self::SLOVENIA                          => 'Slovénie',
            self::ESTONIA                           => 'Estonie',
            self::LATVIA                            => 'Lettonie',
            self::LITHUANIA                         => 'Lituanie',
            self::CHINA                             => 'Chine',
            self::INDIA                             => 'Inde',
            self::JAPAN                             => 'Japon',
            self::SOUTH_KOREA                       => 'Corée du Sud',
            self::NORTH_KOREA                       => 'Corée du Nord',
            self::INDONESIA                         => 'Indonésie',
            self::MALAYSIA                          => 'Malaisie',
            self::PHILIPPINES                       => 'Philippines',
            self::THAILAND                          => 'Thaïlande',
            self::VIETNAM                           => 'Vietnam',
            self::SINGAPORE                         => 'Singapour',
            self::BANGLADESH                        => 'Bangladesh',
            self::PAKISTAN                          => 'Pakistan',
            self::SRI_LANKA                         => 'Sri Lanka',
            self::NEPAL                             => 'Népal',
            self::MONGOLIA                          => 'Mongolie',
            self::KAZAKHSTAN                        => 'Kazakhstan',
            self::UZBEKISTAN                        => 'Ouzbékistan',
            self::TAIWAN                            => 'Taïwan',
            self::ISRAEL                            => 'Israël',
            self::AUSTRALIA                         => 'Australie',
            self::NEW_ZEALAND                       => 'Nouvelle-Zélande',
            self::PAPUA_NEW_GUINEA                  => 'Papouasie-Nouvelle-Guinée',
            self::FIJI                              => 'Fidji',
            self::SOLOMON_ISLANDS                   => 'Îles Salomon',
            self::VANUATU                           => 'Vanuatu',
            self::SAMOA                             => 'Samoa',
            self::TONGA                             => 'Tonga',
            self::MICRONESIA                        => 'Micronésie',
            self::PALAU                             => 'Palaos',
        };
    }
}
