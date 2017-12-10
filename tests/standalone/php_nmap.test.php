<?php

require_once __DIR__ . '/../../bootstrap.php';

use PhpNmap\Exception\PhpNmapException;

#region Basic Exception test for class loading
try {
  throw new PhpNmapException();
} catch (PhpNmapException $exception) {
  echo 'Caught a PHPNmap Exception!';
} catch (Exception $exception) {
  echo 'Caught a generic exception';
}
echo PHP_EOL;
#endregion
