<?php
$root_dir = dirname(__DIR__ , 3);

require_once $root_dir . '/bootstrap.php';

$default_settings = __DIR__.'/../config/docmod_builder.default.yml';
$model_builder_settings = $root_dir.'/config/docmod_builder.yml';

// Check if the config exists, if not, attempt to copy in the default
if (!is_readable($model_builder_settings)) {
  print_r('model_builder.yml is unreadable' . PHP_EOL);
  print_r('Attempting to copy default config...' . PHP_EOL);

  // Testing if can write to file first, user may be missing perms (unlikely but perhaps SE Linux shenanigans)
  if (!touch($model_builder_settings)) {
    throw new Exception($model_builder_settings . ' is not writable! Check permissions!');
  }
  // Attemp to copy
  if (!copy($default_settings, $model_builder_settings)) {
    throw new Exception('Unable to copy defaults to config directory');
  }
}
// Load up the users config
$config = $yml_parser->parse(file_get_contents($model_builder_settings));
// Load up the defaults (even though we copied it, the user may want to only change some settings)
$defaults = $yml_parser->parse(file_get_contents($default_settings));
// Override the defaults with the user defined settings
$config = array_replace_recursive($defaults, $config);
