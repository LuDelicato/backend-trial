<?php

namespace App\Models;

class ProductsModel {
    private $connection;

    public function __construct() {
        $host = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];

        $this->connection = new \mysqli($host, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getAllProducts() {
        $query = "SELECT * 
                    FROM products";
        $result = $this->connection->query($query);
        if ($result) {
            $products = array();

            foreach ($result as $row) {
                $products[] = $row;
            }

            return $products;
        } else {
            return array();
        }
    }

    public function getProductById($id) {
        $id = $this->connection->real_escape_string($id);
        $query = "SELECT * 
                    FROM products 
                    WHERE id = $id";
        $result = $this->connection->query($query);
        return $result->fetch_assoc();
    }

    public function addProduct($sku, $name, $price, $description) {
        $sku = $this->connection->real_escape_string($sku);
        $name = $this->connection->real_escape_string($name);
        $price = $this->connection->real_escape_string($price);
        $description = $this->connection->real_escape_string($description);

        $query = "INSERT INTO products (
                      sku, name, price, description) 
        VALUES ('$sku', '$name', '$price', '$description')";
        return $this->connection->query($query);
    }

    public function updateProduct($id, $sku, $name, $price, $description) {
        $id = $this->connection->real_escape_string($id);
        $sku = $this->connection->real_escape_string($sku);
        $name = $this->connection->real_escape_string($name);
        $price = $this->connection->real_escape_string($price);
        $description = $this->connection->real_escape_string($description);

        $query = "UPDATE products 
                    SET sku='$sku', name='$name', price='$price', description='$description' 
                    WHERE id=$id";

        return $this->connection->query($query);
    }

    public function deleteProduct($id) {
        $id = $this->connection->real_escape_string($id);
        $query = "DELETE FROM products 
                    WHERE id=$id";
        return $this->connection->query($query);
    }

    public function isSkuUnique($sku) {
        $sku = $this->connection->real_escape_string($sku);
        $query = "SELECT * 
                    FROM products 
                    WHERE sku = '$sku'";
        $result = $this->connection->query($query);
        return $result->num_rows === 0;
    }

    public function closeConnection() {
        $this->connection->close();
    }
}

