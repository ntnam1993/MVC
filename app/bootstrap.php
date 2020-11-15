<?php

use App\App\App;
use App\App\Database\Connection;
use App\App\Database\QueryBuilder;


require 'vendor/autoload.php';
require 'helpers/view.php';
require 'helpers/redirect.php';
require 'helpers/helper.php';

App::bind('config', require 'config/config.php');

if (App::get('config')['DEBUG']) {
    require 'helpers/dd.php';
}
App::bind(
    'db',
    new QueryBuilder(Connection::make(App::get('config')['database']))
);