<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
spl_autoload_register(function($class) {
  static $classes = null;
  if ($classes === null) {
    $classes = array(
      'entity\\user' => '/../src/entity/user.php',
      'dao\\idaouser' => '/../src/dao/idaouser.php',
      'dao\\daousersession' => '/../src/dao/daousersession.php',
      'dao\\daousercookie' => '/../src/dao/daousercookie.php',
      'service\\iserviceuser' => '/../src/service/iserviceuser.php',
      'service\\serviceuser' => '/../src/service/serviceuser.php',
      'dic' => 'src/dic.php',
    );
  }
  $cn = strtolower($class);
  // echo "DIR: " .  __DIR__ . "\n";
  // echo "CN: " . $cn . "\n";
  if (isset($classes[$cn])) {
      require __DIR__ . $classes[$cn];
  }
});
