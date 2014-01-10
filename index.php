<?php
date_default_timezone_set('UTC');
require 'lib/Bootstrap.php';
require 'lib/baseController.php';
require 'lib/baseModel.php';
require 'lib/baseView.php';

require 'config.php';
require 'lib/database.php';
require 'lib/session.php';

echo '<script type="text/javascript">alert("indax!");</script>';

$app = new Bootstrap();

// $app->test = $url;
?>
