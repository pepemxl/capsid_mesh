<?php
/**
 * @admin Jose Luis Alonzo Velazquez
 * @version	1.2
 * @package	PP_PACKAGE
 * @subpackage	Application
 */
define("EW_IS_WINDOWS", (strtolower(substr(PHP_OS, 0, 3)) === 'win'), TRUE); // Is Windows OS
define("EW_IS_PHP5", (phpversion() >= "5.0.0"), TRUE); // Is PHP5
define("PP_PATH_DELIMITER", ((EW_IS_WINDOWS) ? "/" : "/"), TRUE); // Physical path delimiter
define("PP_LAST_UPDATE","25/03/2015", TRUE);
?>