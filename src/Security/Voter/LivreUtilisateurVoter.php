<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Livre;
use App\Entity\Utilisateur;

final class LivreUtilisateurVoter extends Voter
{
    protected function supports(string $attribute, mixed $subject): bool
    {
        return 'livre.is_creator' === $attribute && $subject instanceof Livre;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $utilisateur = $token->getUser();
        if(!$utilisateur instanceof Utilisateur){
            return false;
        }

        /** @var Livre $subject */
        return $utilisateur === $subject->getCreatedBy();
    }
}
