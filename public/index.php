<?php 

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';
// var_dump(dirname($_SERVER['SCRIPT_NAME'])); die();
//Constante view, ramène au dessier des vues pareil pour les scripts
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'blogart21');
define('DB_HOST', '89.234.180.29:3306');
define('DB_USER', 'condetmartin');
define('DB_PWD', 'rS#m%W4?74');

//Routes
$router = new Router($_GET['url']);

//Article - Tags Routes
$router->get('/', 'App\Controllers\BlogController@index');

$router->get('/articles', 'App\Controllers\BlogController@index');
$router->get('/articles/:numArt', 'App\Controllers\BlogController@show');

$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

// Auth routes
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');

$router->get('/register', 'App\Controllers\UserController@register');
$router->post('/register', 'App\Controllers\UserController@registerPost');

$router->get('/logout', 'App\Controllers\UserController@logout');

$router->post('/like/:id', 'App\Controllers\LikeController@update');

//Admin routes
$router->get('/admin', 'App\Controllers\Admin\AdminController@index');

$router->get('/admin/statuts', 'App\Controllers\Admin\StatutController@index');
$router->get('/admin/statuts/create', 'App\Controllers\Admin\StatutController@create');
$router->post('/admin/statuts/create', 'App\Controllers\Admin\StatutController@createStatut');
$router->get('/admin/statuts/edit/:id', 'App\Controllers\Admin\StatutController@edit');
$router->post('/admin/statuts/edit/:id', 'App\Controllers\Admin\StatutController@update');
$router->post('/admin/statuts/delete/:id', 'App\Controllers\Admin\StatutController@destroy');

$router->get('/admin/articles', 'App\Controllers\Admin\ArticleController@index');
$router->get('/admin/articles/create', 'App\Controllers\Admin\ArticleController@create');
$router->post('/admin/articles/create', 'App\Controllers\Admin\ArticleController@createArticle');
$router->get('/admin/articles/edit/:id', 'App\Controllers\Admin\ArticleController@edit');
$router->post('/admin/articles/edit/:id', 'App\Controllers\Admin\ArticleController@update');
$router->post('/admin/articles/delete/:id', 'App\Controllers\Admin\ArticleController@destroy');

$router->get('/admin/users', "App\Controllers\Admin\UserController@index");
$router->get('/admin/users/edit/:id', "App\Controllers\Admin\UserController@edit");
$router->post('/admin/users/edit/:id', "App\Controllers\Admin\UserController@update");

$router->get('/admin/motcles', "App\Controllers\Admin\MotcleController@index");
$router->get('/admin/motcles/create', 'App\Controllers\Admin\MotcleController@create');
$router->post('/admin/motcles/create', 'App\Controllers\Admin\MotcleController@createMotcle');
$router->get('/admin/motcles/edit/:id', "App\Controllers\Admin\MotcleController@edit");
$router->post('/admin/motcles/edit/:id', "App\Controllers\Admin\MotcleController@update");
$router->post('/admin/motcles/delete/:id', 'App\Controllers\Admin\MotcleController@destroy');

$router->get('/admin/angles', "App\Controllers\Admin\AngleController@index");
$router->get('/admin/angles/create', 'App\Controllers\Admin\AngleController@create');
$router->post('/admin/angles/create', 'App\Controllers\Admin\AngleController@createAngle');
$router->get('/admin/angles/edit/:id', "App\Controllers\Admin\AngleController@edit");
$router->post('/admin/angles/edit/:id', "App\Controllers\Admin\AngleController@update");
$router->post('/admin/angles/delete/:id', 'App\Controllers\Admin\AngleController@destroy');

$router->get('/admin/thems', "App\Controllers\Admin\ThemController@index");
$router->get('/admin/thems/create', 'App\Controllers\Admin\ThemController@create');
$router->post('/admin/thems/create', 'App\Controllers\Admin\ThemController@createThem');
$router->get('/admin/thems/edit/:id', "App\Controllers\Admin\ThemController@edit");
$router->post('/admin/thems/edit/:id', "App\Controllers\Admin\ThemController@update");
$router->post('/admin/thems/delete/:id', 'App\Controllers\Admin\ThemController@destroy');

//User routes
$router->get('/user', 'App\Controllers\UserController@dashboard');
$router->get('/profile', 'App\Controllers\UserController@profile');

//Apropos route
$router ->get('/apropos', 'App\Controllers\UserController@apropos');

//Accueil route
$router ->get('/accueil', 'App\Controllers\BlogController@index');

//FOOTER route 
$router->get('/footer', 'App\Controllers\ElementController@footer');

//CGU 
$router->get('/CGU', 'App\Controllers\ElementController@cgu');

//Contact
$router->get('/contact', 'App\Controllers\ElementController@contact');

//Reseaux

$router->get('/reseaux', 'App\Controllers\ElementController@reseaux');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
