<?php

namespace App\Factory;

use App\Entity\Livre;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Livre>
 */
final class LivreFactory extends PersistentObjectFactory
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
        return Livre::class;
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
            'dateEdition' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'editeur' => EditeurFactory::new(),
            'auteurs' => AuteurFactory::new()->many(self::faker()->numberBetween(1, 3)),
            'isbn' => self::faker()->isbn13(),
            'etat' => self::faker()->randomElement(LivreStatus::cases()),
            'image' => self::faker()->imageUrl(400, 600, 'books', true),
            'nombre_pages' => self::faker()->numberBetween(50, 2000),
            'prix' => self::faker()->numberBetween(2000, 10000),
            'synopsis' => self::faker()->paragraph(15),
            'titre' => self::faker()->sentence(3),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Livre $livre): void {})
        ;
    }
}
