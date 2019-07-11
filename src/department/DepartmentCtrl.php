<?php
require_once "Department.php";
require_once "DepartmentDAO.php";

class DepartmentCtrl {

    public function list($req, $resp, $args) {
        $dao = new DepartmentDAO();
        $list = $dao->list();
        $resp = $resp->withJson($list);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function searchById($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new DepartmentDAO();
        $department = $dao->searchById($id);
        $resp = $resp->withJson($department);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function insert($req, $resp, $args) {
        $var = $req->getParsedBody();
        $department = new Department(0, $var["name"]);
        $dao = new DepartmentDAO();
        $dao->insert($department);
        $resp = $resp->withJson($department);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function update($req, $resp, $args) {
        $id = (int) $args["id"];
        $var = $req->getParsedBody();
        $department = new Department($id, $var["name"]);
        $dao = new DepartmentDAO();
        $dao->update($department);
        $resp = $resp->withJson($department);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function delete($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new DepartmentDAO();
        $department = $dao->searchById($id);
        $dao->delete($id);
        $resp = $resp->withJson($department);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
?>
