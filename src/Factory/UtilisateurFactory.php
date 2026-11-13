<?php

namespace App\Factory;

use App\Entity\Utilisateur;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Utilisateur>
 */
final class UtilisateurFactory extends PersistentObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct( UserPasswordHasherInterface $passwordHasher)
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Utilisateur::class;
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
            'email' => self::faker()->freeEmail(),
            'firstName' => self::faker()->text(10),
            'lastName' => self::faker()->text(10),
            'password' => self::faker()->text(),
            'roles' => [],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Utilisateur $utilisateur): void {})
        ;
    }
}
