<?php
require_once "Order.php";
require_once "OrderDAO.php";
require_once "src/productOrder/ProductOrderCtrl.php";

class OrderCtrl {

    public function list($req, $resp, $args) {
        $dao = new OrderDAO();
        $list = $dao->list();
        $resp = $resp->withJson($list);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function searchById($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new OrderDAO();
        $order = $dao->searchById($id);
        $resp = $resp->withJson($order);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function insert($req, $resp, $args) {
        $var = $req->getParsedBody();
        $products = $var["products"];
        $order = new Order(0, $var["userId"], $var["notes"], date("Y-m-d"), true, null);
        $dao = new OrderDAO();
        $dao->insert($order);
        $prodOrder = new ProductOrderCtrl();
        foreach ($products as $product) {
          $prodOrder->insert($order->id, $order->products->productId, $order->products->quantity);
        }
        $resp = $resp->withJson($test);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    // public function update($req, $resp, $args) {
    //     $id = (int) $args["id"];
    //     $var = $req->getParsedBody();
    //     $order = new Order($id, $var["name"], $var["email"], $var["departmentId"]);
    //     $dao = new OrderDAO();
    //     $dao->update($order);
    //     $resp = $resp->withJson($order);
    //     $resp = $resp->withHeader("Content-type", "application/json");
    //     return $resp;
    // }
    //
    // public function delete($req, $resp, $args) {
    //     $id = (int) $args["id"];
    //     $dao = new OrderDAO();
    //     $order = $dao->searchById($id);
    //     $dao->delete($id);
    //     $resp = $resp->withJson($order);
    //     $resp = $resp->withHeader("Content-type", "application/json");
    //     return $resp;
    // }
}
?>
