<?php
$defaults = include __DIR__ . DIRECTORY_SEPARATOR . 'app.default.php';
$override_path  = __DIR__ . DIRECTORY_SEPARATOR . 'app.override.php';
$overrides  = [];
if (file_exists($override_path)) {
  $overrides = include $override_path;
}

return array_replace_recursive($defaults, $overrides);
