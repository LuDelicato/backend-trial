<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class ProductsController {
    private $model;

    public function __construct() {
        $this->model = new ProductsModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
        require_once __DIR__ . '/../Views/products_table.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sku = htmlspecialchars($_POST['sku']);
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $description = htmlspecialchars($_POST['description']);

            if (!$this->model->isSkuUnique($sku)) {
                die('SKU already registered');
            }

            $this->model->addProduct($sku, $name, $price, $description);
            header('Location: index.php');
        } else {
            require_once __DIR__ . '/../Views/products_form.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = $this->model->getProductById($productId);
            require_once __DIR__ . '/../Views/products_form.php';

        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = htmlspecialchars($_POST['id']);
            $sku = htmlspecialchars($_POST['sku']);
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $description = htmlspecialchars($_POST['description']);

            // unique product sku checker
            if (!$this->model->isSkuUnique($sku, $id)) {
                $product = $this->model->getProductById($id);
                $errorMessage = 'SKU is already registered.';
                require_once __DIR__ . '/../Views/products_form.php';

            } else {
                $this->model->updateProduct($id, $sku, $name, $price, $description);
                header('Location: index.php');
            }
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $productId = $_GET['id'];
            $this->model->deleteProduct($productId);
            header('Location: index.php');
        }
    }
}
