<?php
## Bootstrap class for including all autoloaders and inialising settings

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Parser;

$dev_mode = getenv('doc_env', true) ? true : false;

$yml_parser = new Parser();

$paths = [
  __DIR__ . "/config/yaml",
];
$config = Setup::createYAMLMetadataConfiguration($paths, $dev_mode);
$db_params = $yml_parser->parse(file_get_contents(__DIR__ . "/config/database.yml"));

$entity_manager = EntityManager::create($db_params, $config);
