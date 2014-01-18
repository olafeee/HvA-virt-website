<?php
/*
=======================================================================
= 						Plaintech index.php							  =
=				Created by Plaintech on november 2013				  =
=				for more info go to www.plaintech.co.uk				  =
=					last modified by jwz					 		  =
=======================================================================
*/
#################################################
# Default settings
#################################################
// error reporting #USE ONLY FOR TEST PURPOSES!!!
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Memory limit
ini_set('memory_limit', '100M');

//Tijdzone
date_default_timezone_set('Europe/Amsterdam');

#################################################
# includes
#################################################
require 'lib/Bootstrap.php';
require 'lib/baseController.php';
require 'lib/baseModel.php';
require 'lib/baseView.php';

require 'config.php';
require 'lib/database.php';
require 'lib/database1.php';
require 'lib/session.php';

#################################################
# Bootstrap inladen a.k.a Router jwz
#################################################
$app = new Bootstrap();
?>
