<?php

$router->get('', 'WorkController@index');
$router->get('workAdd', 'WorkController@add');
$router->post('workAdd', 'WorkController@store');
$router->get('workEdit', 'WorkController@edit');
$router->post('workEdit', 'WorkController@update');
$router->get('workDelete', 'WorkController@delete');
$router->get('calendar', 'CalendarController@show');
$router->get('ajax-get-work', 'CalendarController@getWork');
