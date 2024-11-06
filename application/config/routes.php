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

$route['default_controller'] = "home";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';

// Front
$route['home'] = "home/index";

// User Login
$route['signup'] = "signin/signup";
$route['register'] = "signin/register";
$route['signin'] = "signin/index";
$route['loginsubmit'] = "signin/loginSubmit";
$route['userlogout'] = "signin/logout";
$route['product'] = "home/products";
$route['product-details/(:any)'] = "home/productDetails/$1";
$route['addToCart/(:any)'] = "cart/addToCart/$1";
$route['cart'] = "cart/viewCart";
$route['update-cart'] = "cart/updateCart";
$route['delete-cart/(:any)'] = "cart/deleteCart/$1";
$route['check-out'] = "Checkout/index";
$route['place-order'] = "Checkout/placeOrder";
$route['order-success/(:any)'] = "Checkout/successPage/$1";
$route['order-history'] = "Checkout/orderHistory";
$route['order-details/(:any)'] = "Checkout/orderDetails/$1";
$route['search'] = "Home/search";


// Admin
$route['categories'] = "Categories/index";
$route['addCategoris'] = "Categories/add";
$route['addcategory'] = "Categories/addCategory";
$route['editcategory/(:any)'] = "Categories/edit/$1";
$route['editcategoryinfo'] = "Categories/editCategoryInfo";
$route['deletecategory/(:any)'] = "Categories/delete/$1";


$route['products'] = 'AdminProduct/index';
$route['add'] = 'AdminProduct/add';
$route['addproduct'] = 'AdminProduct/addProduct';
$route['editproduct/(:any)'] = 'AdminProduct/edit/$1';
$route['editproductInfo'] = 'AdminProduct/editProductInfo';
$route['deleteproduct/(:any)'] = 'AdminProduct/deleteproduct/$1';

$route['online-order-history'] = 'AdminOrderDetails/index';
$route['store-order-history'] = 'AdminOrderDetails/storeOrderHistory';
$route['orderDetails/(:any)'] = 'AdminOrderDetails/orderDetails/$1';


$route['low-stock-product'] = 'AdminProduct/lowStockProducts';

