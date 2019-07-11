<?php
require_once "Product.php";
require_once "ProductDAO.php";

class ProductCtrl {

    public function list($req, $resp, $args) {
        $dao = new ProductDAO();
        $list = $dao->list();
        $resp = $resp->withJson($list);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }

    public function searchById($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new ProductDAO();
        $product = $dao->searchById($id);
        $resp = $resp->withJson($product);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }

    public function insert($req, $resp, $args) {
        $var = $req->getParsedBody();
        $product = new Product(0, $var["name"], $var["description"], $var["imgPath"]);
        $dao = new ProductDAO();
        $dao->insert($product);
        $resp = $resp->withJson($product);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function update($req, $resp, $args) {
        $id = (int) $args["id"];
        $var = $req->getParsedBody();
        $product = new Product($id, $var["name"], $var["description"], $var["imgPath"]);
        $dao = new ProductDAO();
        $dao->update($product);
        $resp = $resp->withJson($product);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }

    public function delete($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new ProductDAO();
        $product = $dao->searchById($id);
        $dao->delete($id);
        $resp = $resp->withJson($product);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }
}
?>
