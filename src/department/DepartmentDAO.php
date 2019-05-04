<?php

    class DepartmentDAO {

      public $pdo;

      public function  list() {
        $pdo = PDOFactory::getConnection();
        $query = "SELECT * FROM departments";
        $command = $pdo->prepare($query);
        $command->execute();
        $departments = array();
        while ($row = $command->fetch(PDO::FETCH_OBJ)) {
          $departments[] = new Department($row->id, $row->name);
        }
        return $departments;
    }

    public function searchById($id) {
      $pdo = PDOFactory::getConnection();
      $query = "SELECT * FROM departments WHERE id = :id";
      $command = $pdo->prepare($query);
      $command->bindParam("id", $id);
      $command->execute();
      $result = $command->fetch(PDO::FETCH_OBJ);
      return new Department($result->id,$result->name);
    }

    public function insert(Department $department) {
      $query = "INSERT INTO departments (name) VALUES (:name)";
      $pdo = PDOFactory::getConnection();
      $command = $pdo->prepare($query);
      $command->bindParam(":name", $department->name);
      $command->execute();
      $department->id = $pdo->lastInsertId();
      return $department;
    }

    public function update(Department $department) {
      $query = "UPDATE departments SET name=:name WHERE id=:id";
      $pdo = PDOFactory::getConnection();
      $command = $pdo->prepare($query);
      $command->bindParam(":id", $department->id);
      $command->bindParam(":name", $department->name);
      $command->execute();
      return $department;
    }

    public function delete($id) {
      $query = "DELETE FROM departments WHERE id=:id";
      $pdo = PDOFactory::getConnection();
      $command = $pdo->prepare($query);
      $command->bindParam(":id", $id);
      $command->execute();
      return $id;
    }
  }
?>
