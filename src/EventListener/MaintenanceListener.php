<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class MaintenanceListener
{

    public const IS_MAINTENANCE = false; // Mettre à true pour activer le mode maintenance, false pour le désactiver
    
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    #[AsEventListener(event: KernelEvents::REQUEST, priority: 1000)]
    public function onRequestEvent(RequestEvent $event): void
    {
        if(self::IS_MAINTENANCE) {
            $response = new Response($this->twig->render('maintenance.html.twig'));
            $event->setResponse($response);
        }
    }
}
