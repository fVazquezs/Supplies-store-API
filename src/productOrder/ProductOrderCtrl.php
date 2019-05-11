<?php
require_once "ProductOrder.php";
require_once "ProductOrderDAO.php";

class ProductOrderCtrl
{
    public function listByOrder($id)
    {
        $dao = new ProductOrderDAO();
        $list = $dao->listByOrder($id);
        return $list;
    }

    public function insert($orderId, $productId, $quantity)
    {
        $productOrder = new ProductOrder($productId, null, $orderId, $quantity);
        $dao = new ProductOrderDAO();
        $dao->insert($productOrder);
        $resp = $resp->withJson($productOrder);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function update($req, $resp, $args)
    {
        $id = (int) $args["id"];
        $var = $req->getParsedBody();
        $productOrder = new ProductOrder($var["productId"], $var["orderId"], $var["quantity"]);
        $dao = new ProductOrderDAO();
        $dao->update($productOrder);
        $resp = $resp->withJson($productOrder);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function delete($req, $resp, $args)
    {
        $id = (int) $args["id"];
        $dao = new ProductOrderDAO();
        $productOrder = $dao->searchById($id);
        $dao->delete($id);
        $resp = $resp->withJson($productOrder);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
