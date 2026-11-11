<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

final class DerniereConnectionListener
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[AsEventListener(event: 'security.interactive_login')]
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        $utilisateur = $event->getAuthenticationToken()->getUser();
        if ($utilisateur instanceof Utilisateur) {
            $utilisateur->setDerniereConnection(new \DateTimeImmutable());
            $this->entityManager->flush(); 
        }
    }
}
