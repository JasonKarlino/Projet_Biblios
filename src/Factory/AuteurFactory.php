<?php

namespace App\Factory;

use App\Entity\Auteur;
use App\Enum\NationaliteEnum;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Auteur>
 */
final class AuteurFactory extends PersistentObjectFactory
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
        return Auteur::class;
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
            'date_naissance' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'date_deces' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'nationalite' => self::faker()->randomElement(NationaliteEnum::cases()),
            'nomPrenom' => self::faker()->unique()->text(20),
            'livres' => LivreFactory::new()->many(self::faker()->numberBetween(1, 3))
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Auteur $auteur): void {})
        ;
    }
}
