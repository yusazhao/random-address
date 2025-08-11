<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|
|
| This route indicates which controller class should be loaded if the
| URI contains no data.
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
$route['index'] = 'Random_Address/index';
$route['default_controller'] = 'Random_Address/index';





// Address routes (keep specific routes before general ones)
$route['random-address-generator-countries'] = 'Random_Address/random_address_countries';

$route['random-address-generator/(:any)-(:any)'] = 'Random_Address/random_address_state';
$route['random-address-generator/(:any)'] = 'Random_Address/index';

// Other pages
$route['about-us'] = 'Footprint/aboutus';
$route['terms'] = 'Footprint/termsofuse';
$route['privacy-policy'] = 'Footprint/privacypolicy';
$route['cookie-policy'] = 'Footprint/cookiepolicy';




$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;
