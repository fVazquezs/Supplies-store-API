<?php
class User {

    public $id;
    public $name;
    public $email;
    public $departmentId;

    function __construct($id, $name, $email, $departmentId) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->departmentId = $departmentId;
    }
}
?>
