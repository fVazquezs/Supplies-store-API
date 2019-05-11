<?php
class ProductOrder {

    public $productId;
    public $productName;
    public $orderId;
    public $quantity;

    function __construct($productId, $productName, $orderId, $quantity) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->orderId = $orderId;
        $this->quantity = $quantity;
    }
}
?>
