<?php

    class OrderDAO
    {
        public $pdo;

        public function list()
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM orders";
            $command = $pdo->prepare($query);
            $command->execute();
            $orders = array();
            while ($row = $command->fetch(PDO::FETCH_OBJ)) {
                $orders[] = new Order($row->id, $row->name, $row->email, $row->departmentId);
            }
            return $orders;
        }

        public function searchById($id)
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM orders WHERE id = :id";
            $command = $pdo->prepare($query);
            $command->bindParam("id", $id);
            $command->execute();
            $result = $command->fetch(PDO::FETCH_OBJ);
            return new Order($result->id, $result->name, $result->email, $result->departmentId);
        }

        public function insert(Order $order)
        {
            $query = "INSERT INTO orders (name, email, departmentId) VALUES (:name, :email, :departmentId)";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":name", $order->name);
            $command->bindParam(":email", $order->email);
            $command->bindParam(":departmentId", $order->departmentId);
            $command->execute();
            $order->id = $pdo->lastInsertId();
            return $order;
        }

        public function update(Order $order)
        {
            $query = "UPDATE orders SET name=:name, email=:email, departmentId=:departmentId WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $order->id);
            $command->bindParam(":name", $order->name);
            $command->bindParam(":email", $order->email);
            $command->bindParam(":departmentId", $order->departmentId);
            $command->execute();
            return $order;
        }

        public function delete($id)
        {
            $query = "DELETE FROM orders WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $id);
            $command->execute();
            return $id;
        }
    }
