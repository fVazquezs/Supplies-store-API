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
        $productOrder = new ProductOrder($productId, "", $orderId, $quantity);
        $dao = new ProductOrderDAO();
        $dao->insert($productOrder);
        return $prodOrder;
    }

    public function update($orderId, $productId, $quantity)
    {
        $productOrder = new ProductOrder($productId, "", $orderId, $quantity);
        $dao = new ProductOrderDAO();
        $dao->update($productOrder);
        return $prodOrder;
    }

    public function delete($id)
    {
        $dao = new ProductOrderDAO();
        $dao->delete($id);
        return $productOrder;
    }
}
