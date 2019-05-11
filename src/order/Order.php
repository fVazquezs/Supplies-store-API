<?php
class Order
{
    public $id;
    public $user;
    public $notes;
    public $date;
    public $status;
    public $products;

    public function __construct($id, $user, $notes, $date, $status, $products)
    {
        $this->id = $id;
        $this->user = $user;
        $this->notes = $notes;
        $this->date = $date;
        $this->status = $status;
        $this->products = $products;
    }
}
