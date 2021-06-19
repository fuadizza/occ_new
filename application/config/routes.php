<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//admin
$route['admin/home'] = 'home';

//admin
$route['admin/user'] = 'admin/user';
$route['admin/user/add'] = 'admin/userAdd';
$route['admin/user/edit/(:any)'] = 'admin/userEdit/$1';
$route['admin/user/delete/(:any)'] = 'admin/userDelete/$1';

//task
$route['admin/task'] = 'task';
$route['admin/task/add'] = 'task/add';
$route['admin/task/edit/(:any)'] = 'task/edit/$1';

//admin job
$route['admin/job'] = 'job';
$route['admin/job/delete/(:any)'] = 'job/delete/$1';
$route['admin/job/edit/(:any)'] = 'job/edit/$1';

//task
$route['admin/monitoring'] = 'monitoring';
$route['admin/monitoring/detail/(:any)'] = 'monitoring/detail/$1';

// user monitoring
$route['user/monitoring'] = 'user/monitoring';
$route['user/history'] = 'user/history';
$route['user/history/detail/(:any)'] = 'user/detail/$1';

//admin case
$route['admin/cases'] = 'cases';
$route['admin/cases/edit/(:any)'] = 'cases/edit/$1';
$route['admin/cases/delete/(:any)'] = 'cases/delete/$1';

//admin sub case
$route['admin/sub_cases'] = 'sub_cases';
$route['admin/sub_cases/delete/(:any)'] = 'sub_cases/delete/$1';
$route['admin/sub_cases/edit/(:any)'] = 'sub_cases/edit/$1';

//admin job
$route['admin/job'] = 'job';
$route['admin/job/delete/(:any)'] = 'job/delete/$1';
