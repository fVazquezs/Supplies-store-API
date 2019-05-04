<?php

    class ProductDAO
    {
        public $pdo;

        public function list()
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM products";
            $command = $pdo->prepare($query);
            $command->execute();
            $products = array();
            while ($row = $command->fetch(PDO::FETCH_OBJ)) {
                $products[] = new Product($row->id, $row->name, $row->description, $row->imgPath);
            }
            return $products;
        }

        public function searchById($id)
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM products WHERE id = :id";
            $command = $pdo->prepare($query);
            $command->bindParam("id", $id);
            $command->execute();
            $result = $command->fetch(PDO::FETCH_OBJ);
            return new Product($result->id, $result->name, $result->description, $result->imgPath);
        }

        public function insert(Product $product)
        {
            $query = "INSERT INTO products (name, description, imgPath) VALUES (:name, :description, :imgPath)";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":name", $product->name);
            $command->bindParam(":description", $product->description);
            $command->bindParam(":imgPath", $product->imgPath);
            $command->execute();
            $product->id = $pdo->lastInsertId();
            return $product;
        }

        public function update(Product $product)
        {
            $query = "UPDATE products SET name=:name, description=:description, imgPath=:imgPath WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $product->id);
            $command->bindParam(":name", $product->name);
            $command->bindParam(":description", $product->description);
            $command->bindParam(":imgPath", $product->imgPath);
            $command->execute();
            return $product;
        }

        public function delete($id)
        {
            $query = "DELETE FROM products WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $id);
            $command->execute();
            return $id;
        }
    }
