<?php

namespace App\Repository;

use App\Entity\Mission;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class MissionRepository extends EntityRepository
{
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Mission::class));
    }
}
