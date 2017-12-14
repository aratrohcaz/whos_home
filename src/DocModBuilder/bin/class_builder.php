<?php

require_once __DIR__ . '/../bootstrap.php';

$root_dir = dirname(__DIR__ , 1);

var_dump($root_dir);

$model_builder_settings = $root_dir.'/config/model_builder.yml';

if (!file_exists($model_builder_settings)) {
  throw new Exception('model_builder.yml is missing from config directory');
}


$config = $yml_parser->parse(file_get_contents($model_builder_settings));

var_dump($config);
