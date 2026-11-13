<?php

namespace App\Factory;

use App\Entity\Commentaire;
use App\Enum\CommentaireStatus;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Commentaire>
 */
final class CommentaireFactory extends PersistentObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Commentaire::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
    {
        return [
            'contenu' => self::faker()->paragraph(2),
            'date_creation' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'date_publication' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'livre' => LivreFactory::new(),
            'mailAuteur' => self::faker()->freeEmail(),
            'nomAuteur' => self::faker()->text(20),
            'statut' => self::faker()->randomElement(CommentaireStatus::cases()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Commentaire $commentaire): void {})
        ;
    }
}
