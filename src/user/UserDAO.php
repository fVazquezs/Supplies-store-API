<?php

    class UserDAO
    {
        public $pdo;

        public function list()
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM users";
            $command = $pdo->prepare($query);
            $command->execute();
            $users = array();
            while ($row = $command->fetch(PDO::FETCH_OBJ)) {
                $users[] = new User($row->id, $row->name, $row->email, $row->password, $row->departmentId);
            }
            return $users;
        }

        public function searchById($id)
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM users WHERE id = :id";
            $command = $pdo->prepare($query);
            $command->bindParam("id", $id);
            $command->execute();
            $result = $command->fetch(PDO::FETCH_OBJ);
            return new User($result->id, $result->name, $result->email, $row->password, $result->departmentId);
        }

        public function searchByEmail($email)
        {
            $pdo = PDOFactory::getConnection();
            $query = "SELECT * FROM users WHERE email = :email";
            $command = $pdo->prepare($query);
            $command->bindParam("email", $email);
            $command->execute();
            $result = $command->fetch(PDO::FETCH_OBJ);
            return new User($result->id, $result->name, $result->email, $row->password, $result->departmentId);
        }

        public function insert(User $user)
        {
            $query = "INSERT INTO users (name, email, password, departmentId) VALUES (:name, :email, :password, :departmentId)";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":name", $user->name);
            $command->bindParam(":email", $user->email);
            $command->bindParam(":password", $user->password);
            $command->bindParam(":departmentId", $user->departmentId);
            $command->execute();
            $user->id = $pdo->lastInsertId();
            return $user;
        }

        public function update(User $user)
        {
            $query = "UPDATE users SET name=:name, email=:email, password=:password, departmentId=:departmentId WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $user->id);
            $command->bindParam(":name", $user->name);
            $command->bindParam(":email", $user->email);
            $command->bindParam(":password", $user->password);
            $command->bindParam(":departmentId", $user->departmentId);
            $command->execute();
            return $user;
        }

        public function delete($id)
        {
            $query = "DELETE FROM users WHERE id=:id";
            $pdo = PDOFactory::getConnection();
            $command = $pdo->prepare($query);
            $command->bindParam(":id", $id);
            $command->execute();
            return $id;
        }
    }
