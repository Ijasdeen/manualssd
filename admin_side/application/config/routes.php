<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

$route['default_controller'] = 'Controllerunit';

$route['index'] = 'Controllerunit/index';

$route['Suppliers'] = 'Controllerunit/Suppliers';

$route['warehouse'] = 'Controllerunit/warehouse';


$route['addbrands'] = 'Controllerunit/addbrands';

$route['addcategories'] = 'Controllerunit/addcategories';

$route['subcategory'] = 'Controllerunit/subcategory';

$route['staffbase'] = 'Controllerunit/staffbase';


$route['warehouselogin'] = 'Controllerunit/warehouselogin';

$route['warehousehome'] = 'Controllerunit/warehousehome';


$route['viewproducts'] = 'Controllerunit/viewproducts';

$route['addproducts'] = 'Controllerunit/addproducts';

 


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
