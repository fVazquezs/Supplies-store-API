<?php
require_once "User.php";
require_once "UserDAO.php";

class UserCtrl {

    public function list($req, $resp, $args) {
        $dao = new UserDAO();
        $list = $dao->list();
        $resp = $resp->withJson($list);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function searchById($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new UserDAO();
        $user = $dao->searchById($id);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function insert($req, $resp, $args) {
        $var = $req->getParsedBody();
        $user = new User(0, $var["name"], $var["email"], $var["departmentId"]);
        $dao = new UserDAO();
        $dao->insert($user);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function update($req, $resp, $args) {
        $id = (int) $args["id"];
        $var = $req->getParsedBody();
        $user = new User($id, $var["name"], $var["email"], $var["departmentId"]);
        $dao = new UserDAO();
        $dao->update($user);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function delete($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new UserDAO();
        $user = $dao->searchById($id);
        $dao->delete($id);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
?>
