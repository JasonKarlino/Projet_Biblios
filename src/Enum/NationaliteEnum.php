<?php

namespace App\Enum;

enum NationaliteEnum: string
{
    case ALGERIENNE = 'algérienne';
    case ALLEMANDE = 'allemande';
    case ANDORRANE = 'andorrane';
    case ANGLAISE = 'anglaise';
    case ARGENTINE = 'argentine';
    case AUSTRALIENNE = 'australienne';
    case AUTRICHIENNE = 'autrichienne';
    case BELGE = 'belge';
    case BRESILIENNE = 'brésilienne';
    case CANADIENNE = 'canadienne';
    case CHINOISE = 'chinoise';
    case COLOMBIENNE = 'colombienne';
    case COREENNE = 'coréenne';
    case DANEMARQUAISE = 'danoise';
    case ESPAGNOLE = 'espagnole';
    case ESTONIENNE = 'estonienne';
    case ETATS_UNIS = 'américaine';
    case FINLANDAISE = 'finlandaise';
    case GRECQUE = 'grèque';
    case HONGROISE = 'hongroise';
    case INDIENNE = 'indienne';
    case INDONESIENNE = 'indonésienne';
    case IRLANDAISE = 'irlandaise';
    case ISLANDAISE = 'islandaise';
    case ITALIENNE = 'italienne';
    case JAPONAISE = 'japonaise';
    case LIBANAISE = 'libanaise';
    case LUXEMBOURGEOISE = 'luxembourgeoise';
    case MAROCAINE = 'marocaine';
    case MEXICAINE = 'mexicaine';
    case NEOZELANDAISE = 'néo-zélandaise';
    case NORVEGIENNE = 'norvégienne';
    case NIGERIENNE = 'nigériane';
    case PAYS_BAS = 'néerlandaise';
    case POLONAISE = 'polonaise';
    case PORTUGAISE = 'portugaise';
    case QATARIE = 'qatarie';
    case ROUMAINE = 'roumaine';
    case RUSSE = 'russe';
    case SENEGALAISE = 'sénégalaise';
    case SINGAPOURIENNE = 'singapourienne';
    case SLOVAQUE = 'slovaque';
    case SLOVENE = 'slovène';
    case SUEDE = 'suédoise';
    case SUISSE = 'suisse';
    case TURQUE = 'turque';
    case UKRAINIENNE = 'ukrainienne';
    case VENEZUELIENNE = 'vénézuélienne';
    case VIETNAMIENNE = 'vietnamienne';
    case AFGHANE = 'afghane';

    public function getLabel(): string
    {
        return match ($this) {
            self::ALGERIENNE => 'Algérienne',
            self::ALLEMANDE => 'Allemande',
            self::ANDORRANE => 'Andorrane',
            self::ANGLAISE => 'Anglaise',
            self::ARGENTINE => 'Argentine',
            self::AUSTRALIENNE => 'Australienne',
            self::AUTRICHIENNE => 'Autrichienne',
            self::BELGE => 'Belge',
            self::BRESILIENNE => 'Brésilienne',
            self::CANADIENNE => 'Canadienne',
            self::CHINOISE => 'Chinoise',
            self::COLOMBIENNE => 'Colombienne',
            self::COREENNE => 'Coréenne',
            self::DANEMARQUAISE => 'Danoise',
            self::ESPAGNOLE => 'Espagnole',
            self::ESTONIENNE => 'Estonienne',
            self::ETATS_UNIS => 'Américaine',
            self::FINLANDAISE => 'Finlandaise',
            self::GRECQUE => 'Grèque',
            self::HONGROISE => 'Hongroise',
            self::INDIENNE => 'Indienne',
            self::INDONESIENNE => 'Indonésienne',
            self::IRLANDAISE => 'Irlandaise',
            self::ISLANDAISE => 'Islandaise',
            self::ITALIENNE => 'Italienne',
            self::JAPONAISE => 'Japonaise',
            self::LIBANAISE => 'Libanaise',
            self::LUXEMBOURGEOISE => 'Luxembourgeoise',
            self::MAROCAINE => 'Marocaine',
            self::MEXICAINE => 'Mexicaine',
            self::NEOZELANDAISE => 'Néo‑Zélandaise',
            self::NORVEGIENNE => 'Norvégienne',
            self::NIGERIENNE => 'Nigériane',
            self::PAYS_BAS => 'Néerlandaise',
            self::POLONAISE => 'Polonaise',
            self::PORTUGAISE => 'Portugaise',
            self::QATARIE => 'Qatarie',
            self::ROUMAINE => 'Roumaine',
            self::RUSSE => 'Russe',
            self::SENEGALAISE => 'Sénégalaise',
            self::SINGAPOURIENNE => 'Singapourienne',
            self::SLOVAQUE => 'Slovaque',
            self::SLOVENE => 'Slovène',
            self::SUEDE => 'Suédoise',
            self::SUISSE => 'Suisse',
            self::TURQUE => 'Turque',
            self::UKRAINIENNE => 'Ukrainienne',
            self::VENEZUELIENNE => 'Vénézuélienne',
            self::VIETNAMIENNE => 'Vietnamienne',
            self::AFGHANE => 'Afghane',
        };
    }
}
