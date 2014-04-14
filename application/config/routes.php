<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';

$route['registro/nuevo'] = 'register/index';
$route['registro'] = 'register/registered';

$route['inicio'] = 'login/log_in';
$route['salir'] = 'login/logout';

$route['pedido/(:num)'] = 'order/order_id/$1';
$route['pedidos/nuevo'] = 'order/index';
$route['pedidos/registro'] = 'order/new_order';
$route['pedidos'] = 'order/orders_list';

$route['semillas/nuevo'] = 'order/seeds';
$route['semillas'] = 'order/seeds'; // Debe cambiarse a la vista que registra las semillas y redirecciona

$route['usuarios'] = 'login/log_in'; // Esta debe cambiarse a la vista de los usuarios
$route['cuenta'] = 'user/index'; 


/* End of file routes.php */
/* Location: ./application/config/routes.php */