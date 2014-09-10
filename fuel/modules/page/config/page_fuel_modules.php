<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['page_manage'] = array(
		'module_name' => '產品管理',
		'model_name' => 'page_manage_model',
		'module_uri' => 'page/lists',
		'model_location' => 'page',
		'permission' => 'page/manage',
		'nav_selected' => 'page/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改'
	);
?>