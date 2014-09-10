<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'page/lists'] 			= PAGE_FOLDER.'/page_manage/lists';
$route[FUEL_ROUTE.'page/lists/(:num)'] 		= PAGE_FOLDER.'/page_manage/lists/$1';
$route[FUEL_ROUTE.'page/create'] 			= PAGE_FOLDER.'/page_manage/create';
$route[FUEL_ROUTE.'page/edit/(:num)'] 		= PAGE_FOLDER.'/page_manage/edit/$1';
$route[FUEL_ROUTE.'page/del/(:num)'] 		= PAGE_FOLDER.'/page_manage/do_del/$1';
$route[FUEL_ROUTE.'page/do_create'] 		= PAGE_FOLDER.'/page_manage/do_create';
$route[FUEL_ROUTE.'page/do_edit/(:num)'] 	= PAGE_FOLDER.'/page_manage/do_edit/$1';
$route[FUEL_ROUTE.'page/do_multi_del'] 		= PAGE_FOLDER.'/page_manage/do_multi_del'; 
$route[FUEL_ROUTE.'page/series/(:any)/(:any)/(:any)'] 		= PAGE_FOLDER.'/page_manage/get_series/$1/$2/$3';

 