<?php

// auto load composer
require_once __DIR__ . '/../vendor/autoload.php';

// env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// namespace classes autoloader
spl_autoload_register(function ($className) {
    // convert
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = __DIR__ . '/../app/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// routing with switch
$action = isset($_GET['action']) ? $_GET['action'] : '';
$controller = new App\Controllers\ProductsController();

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}
