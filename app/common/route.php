<?php
session_start();
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . DBHOST . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
// $router->get('/', function(){
//     return "trang chủ";
// });
//định nghĩa đường dẫn trỏ đến Product Controller
$router->get('/', [App\Controllers\ControllerPro::class, 'showLogin']);
$router->get('webUser', [App\Controllers\ControllerPro::class, 'getWebUser']);
$router->get('products_detal', [App\Controllers\ControllerPro::class, 'getDetail']);
$router->post('Login', [App\Controllers\ControllerPro::class, 'checkLogin']);

// $router->get('Login', [App\Controllers\ControllerPro::class, 'showLogin']);

$router->get('/listPro', [App\Controllers\ControllerPro::class, 'listProduct']);
$router->post('addPro', [App\Controllers\ControllerPro::class, 'addIndex']);
$router->get('addPro', [App\Controllers\ControllerPro::class, 'addProduct']);
$router->get('updateProduct', [App\Controllers\ControllerPro::class, 'updateProductMD']);
$router->post('updateProPost', [App\Controllers\ControllerPro::class, 'updateIndex']);
$router->get('deleteProduct', [App\Controllers\ControllerPro::class, 'deletePro']);


//CATEGORY
$router->get('/listCate', [App\Controllers\ControllerPro::class, 'listCate']);
$router->get('addCate', [App\Controllers\ControllerPro::class, 'addCate']);
$router->post('addCategory', [App\Controllers\ControllerPro::class, 'addLocaCtrl']);
$router->get('deleteCategory', [App\Controllers\ControllerPro::class, 'deleteCate']);
$router->get('updateCategory', [App\Controllers\ControllerPro::class, 'updateCtCate']);
$router->post('updatePost', [App\Controllers\ControllerPro::class, 'updateSubmit']);





# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>