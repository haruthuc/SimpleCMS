<?php
/** error report * */
error_reporting(E_ALL);
define('__SITE_PATH', realpath(dirname(__FILE__)));
define("__DEBUG", 0);
define("__ADMIN_PATH","admin");
define("__ROUTER_FILE_CONFIG",FALSE);
define("__TEMPLATE_DEFAULT","default");
define("__TEMPLATE_ADMIN","admin");


include_once __SITE_PATH.'/ww.init/Bootstrap.php';


  DatabaseManager::setDatabaseConnection(new PDOMySQLManager());
  DatabaseManager::getDatabaseConnection();


?>