<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'app/bootstrap.php';

use App\App\Request;
use App\App\Router;

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
