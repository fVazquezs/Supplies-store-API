<?php
class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $departmentId;

    public function __construct($id, $name, $email, $password, $departmentId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password= $password;
        $this->departmentId = $departmentId;
    }
}
