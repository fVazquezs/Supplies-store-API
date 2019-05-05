<?php
class Order
{
    public $id;
    public $userId;
    public $notes;
    public $date;
    public $status;

    public function __construct($id, $userId, $notes, $date, $status)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->notes = $notes;
        $this->date = $date;
        $this->status = $status;
    }
}
