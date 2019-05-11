<?php

require_once "src/productOrder/ProductOrderCtrl.php";
    class OrderDAO
    {
        public $pdo;

        public function list()
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT orders.id, users.name, orders.notes, orders.date, orders.status
                      FROM orders, users
                      WHERE orders.userId = users.id";
            $command = $pdo->prepare($query);
            $command->execute();
            $orders = array();
            while ($row = $command->fetch(PDO::FETCH_OBJ)) {
                $prodOrder = new ProductOrderCtrl();
                $orders[] = new Order($row->id, $row->name, $row->notes, $row->date, $row->status, $prodOrder->listByOrder($row->id));
            }
            return $orders;
        }

        public function searchById($id)
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT orders.id, users.name, orders.notes, orders.date, orders.status
                      FROM orders, users
                      WHERE orders.id=:id AND orders.userId = users.id";
            $command = $pdo->prepare($query);
            $command->bindParam("id", $id);
            $command->execute();
            $result = $command->fetch(PDO::FETCH_OBJ);
            $prodOrder = new ProductOrderCtrl();
            return  new Order($result->id, $result->name, $result->notes, $result->date, $result->status, $prodOrder->listByOrder($result->id));
        }

        public function insert(Order $order)
        {
            $query = "INSERT INTO orders (userId, notes, date, status) VALUES (:userId, :notes, :date, :status)";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":userId", $order->user);
            $command->bindParam(":notes", $order->notes);
            $command->bindParam(":date", $order->date);
            $command->bindParam(":status", $order->status);
            $command->execute();
            $order->id = $pdo->lastInsertId();
            return $order;
        }

        // public function update(Order $order)
        // {
        //     $query = "UPDATE orders SET name=:name, email=:email, departmentId=:departmentId WHERE id=:id";
        //     $pdo = PDOFactory::getConnection();
        //     $command = $pdo->prepare($query);
        //     $command->bindParam(":id", $order->id);
        //     $command->bindParam(":name", $order->name);
        //     $command->bindParam(":email", $order->email);
        //     $command->bindParam(":departmentId", $order->departmentId);
        //     $command->execute();
        //     return $order;
        // }
        //
        // public function delete($id)
        // {
        //     $query = "DELETE FROM orders WHERE id=:id";
        //     $pdo = PDOFactory::getConnection();
        //     $command = $pdo->prepare($query);
        //     $command->bindParam(":id", $id);
        //     $command->execute();
        //     return $id;
        // }
    }
