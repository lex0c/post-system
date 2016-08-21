<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    __DIR__ . "/entity"
];

$isDevMode = true;

$dbParams = [
    "driver"   => "pdo_mysql",
      "user"   => "root",
      "password"   => "1994",
    "dbname"   => "sys_post_doctrine"
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager()
{
    global $entityManager;
    return $entityManager;
}
