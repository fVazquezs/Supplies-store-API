<?php

    class ProductOrderDAO
    {
        public $pdo;

        public function list()
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM productOrder";
            $command = $pdo->prepare($query);
            $command->execute();
            $productOrders = array();
            while ($row = $command->fetch(PDO::FETCH_OBJ)) {
                $productOrders[] = new ProductOrder($row->id, $row->productId, $row->orderId, $row->quantity);
            }
            return $productOrders;
        }

        public function insert(ProductOrder $productOrder)
        {
            $query = "INSERT INTO productOrder (productId, orderId, quantity) VALUES (:productId, :orderId, :quantity)";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":productId", $productOrder->productId);
            $command->bindParam(":orderId", $productOrder->orderId);
            $command->bindParam(":quantity", $productOrder->quantity);
            $command->execute();
            $productOrder->id = $pdo->lastInsertId();
            return $productOrder;
        }

        public function update(ProductOrder $productOrder)
        {
            $query = "UPDATE productOrder SET quantity=:quantity WHERE productId=:productId AND orderId=:orderId";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":productId", $productOrder->productId);
            $command->bindParam(":orderId", $productOrder->orderId);
            $command->bindParam(":quantity", $productOrder->quantity);
            $command->execute();
            return $productOrder;
        }

        public function delete($id)
        {
            $query = "DELETE FROM productOrder WHERE productId=:productId AND orderId=:orderId";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $id);
            $command->execute();
            return $id;
        }
    }
