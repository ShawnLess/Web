<?php

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

//set timezone
date_default_timezone_set('China/Beijing');

//site address
define('DIR','http://www.shawnless.net/Shawn/');

//database details ONLY NEEDED IF USING A DATABASE
define('DB_TYPE','mysql');
define('DB_HOST','localhost');

if(isset($_SESSION['smvc_baby']) && $_SESSION['smvc_baby'] == true){
    define('DB_NAME','BabyBlog');
}else {
    define('DB_NAME','ShawnBlog');
}

//define('DB_USER','user2387323');
define('DB_USER','shawn');
define('DB_PASS','ytmfitss');
define('PREFIX','');

//set prefix for sessions
define('SESSION_PREFIX','smvc_');

//optionall create a constant for the name of the site
define('SITETITLE','Shaolin Xie\'website ');

//set the default template
Session::set('template','default');
