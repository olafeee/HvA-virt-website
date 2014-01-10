<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');
require 'lib/Bootstrap.php';
require 'lib/baseController.php';
require 'lib/baseModel.php';
require 'lib/baseView.php';

require 'config.php';
require 'lib/database.php';
require 'lib/session.php';

$app = new Bootstrap();

phpinfo();
// $app->test = $url;
?>
