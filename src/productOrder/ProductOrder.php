<?php
class ProductOrder {

    public $productId;
    public $orderId;
    public $quantity;

    function __construct($productId, $orderId, $quantity) {
        $this->productId = $productId;
        $this->orderId = $orderId;
        $this->quantity = $quantity;
    }
}
?>
