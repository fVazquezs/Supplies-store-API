<?php
class Product {

    public $id;
    public $name;
    public $description;
    public $imgPath;

    function __construct($id, $name, $description, $imgPath) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imgPath = $imgPath;
    }
}
?>
