<?php

namespace App\State;

use App\Entity\Utilisateurs;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurProcessor implements ProcessorInterface
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher, private EntityManagerInterface $manager)
    {
        
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if($data instanceof Utilisateurs === false){
            return;
        }

        // dd($this->utilisateurPasswordHasherInterface);
        $data->setPassword($this->passwordHasher->hashPassword($data, $data->getPassword()));

        // dd($operation->getName());
        if($operation->getName() === '_api_/utilisateurs{._format}_post'){
            $data->setCreatedAt(new DateTimeImmutable());
        }

        $this->manager->persist($data);
        $this->manager->flush();
        // dd($data, $operation, $uriVariables, $context);
    }
}
