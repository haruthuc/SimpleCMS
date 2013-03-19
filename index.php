<?php

/** error report * */
error_reporting(E_ALL);
define('__SITE_PATH', realpath(dirname(__FILE__)));
define("__FOLDER","CMS2");
define("__DEBUG", 0);
define("__ADMIN_PATH", "admin");
define("__ROUTER_FILE_CONFIG", FALSE);
define("__TEMPLATE_DEFAULT", "default");
define("__TEMPLATE_ADMIN", "admin");
define("__SESSION_ENGINE","DATABASE");
define("__SESSION_TIMEOUT",12000);

include_once __SITE_PATH . '/ww.init/Bootstrap.php';

?>