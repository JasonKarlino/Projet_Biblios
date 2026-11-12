<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class LangueListener
{
    private string $defaultLocale = 'fr';
    private array $supportedLocales = ['fr', 'en'];

    #[AsEventListener(event: KernelEvents::REQUEST, priority: 2000)]
    public function onRequestEvent(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $locale = $request->query->get('lang');
        if(!$locale && $request->hasSession()) {
            $locale = $request->cookies->get('lang');
        }
        if(!$locale) {
            $locale = $request->getPreferredLanguage($this->supportedLocales);
        }
        $request->setLocale($locale ?? $this->defaultLocale);
    }
}
