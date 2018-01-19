<?php
require('app/core/autoloader.php');

//define routes
//Router::get('/', 'entries@entries');
Router::get('', 'resume@resume');
Router::get('baby', 'baby@baby');
Router::get('entries', 'entries@entries');
Router::get('entries/index/(:any)', 'entries@index');
Router::get('single_entry/(:any)', 'single_entry@index');
Router::get('single_entry/add', 'single_entry@add');
Router::post('single_entry/add', 'single_entry@add');
Router::get('single_entry/confirm_delete/(:any)', 'single_entry@confirm_delete');
Router::post('single_entry/confirm_delete/(:any)', 'single_entry@confirm_delete');
Router::get('single_entry/confirm_comment_delete/(:any)', 'single_entry@confirm_comment_delete');
Router::post('single_entry/confirm_comment_delete/(:any)', 'single_entry@confirm_comment_delete');
Router::get('single_entry/edit/(:any)', 'single_entry@edit');
Router::post('single_entry/edit/(:any)', 'single_entry@edit');
Router::get('single_entry/comment_add/(:any)', 'single_entry@comment_add');
Router::post('single_entry/comment_add/(:any)', 'single_entry@comment_add');
Router::post('upload/upload', 'upload@upload');
Router::get('admin/login', 'admin@login');
Router::post('admin/login', 'admin@login');
Router::get('admin/logout', 'admin@logout');


//if no route found
Router::error('error@index');

//execute matched routes
Router::dispatch();
ob_flush();
