<?php

namespace App\DataFixtures\Processor;

use App\Entity\Utilisateurs;
use Fidry\AliceDataFixtures\ProcessorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UtilisateurProcessor implements ProcessorInterface
{
    public function __construct(private UserPasswordHasherInterface $utilisateurPasswordHasherInterface)
    {
    }

    /**
     * @inheritdoc
     */
    public function preProcess(string $fixtureId, $object): void
    {
        // dd("c'est nul");
        if(false == $object instanceof Utilisateurs){
            // dd("ibrabosss");
            return;
        }
        // dd($object);
        $object->setPassword($this->utilisateurPasswordHasherInterface->hashPassword($object, $object->getPassword()));
    }

    /**
     * @inheritdoc
     */
    public function postProcess(string $fixtureId, $object): void
    {
        // ne fais rien
    }
}

?>