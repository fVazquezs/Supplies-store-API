<?php

require_once "src/PDOFactory.php";
require_once "src/department/DepartmentCtrl.php";
require_once "src/product/ProductCtrl.php";
require_once "src/user/UserCtrl.php";
require_once "src/order/OrderCtrl.php";

// require_once "jwt/jwtauth.php";
// require_once "jwt/jwtmiddleware.php";

require "vendor/autoload.php";

$config = ['settings'=> [
        'displayErrorDetails' => true
    ],
];

$app = new \Slim\App($config);


$app->group(
    "/departments",
    function () {
        $this->get("", "DepartmentCtrl:list");
        $this->get("/{id:[0-9]+}", "DepartmentCtrl:searchById");
        $this->post("", "DepartmentCtrl:insert");
        $this->put("/{id:[0-9]+}", "DepartmentCtrl:update");
        $this->delete("/{id:[0-9]+}", "DepartmentCtrl:delete");
    }
);

$app->group(
    "/products",
    function () {
        $this->get("", "ProductCtrl:list");
        $this->get("/{id:[0-9]+}", "ProductCtrl:searchById");
        $this->post("", "ProductCtrl:insert");
        $this->put("/{id:[0-9]+}", "ProductCtrl:update");
        $this->delete("/{id:[0-9]+}", "ProductCtrl:delete");
    }
);

$app->group(
    "/users",
    function () {
        $this->get("", "UserCtrl:list");
        $this->get("/{id:[0-9]+}", "UserCtrl:searchById");
        $this->post("", "UserCtrl:insert");
        $this->put("/{id:[0-9]+}", "UserCtrl:update");
        $this->delete("/{id:[0-9]+}", "UserCtrl:delete");
    }
);

$app->group(
    "/orders",
    function () {
        $this->get("", "OrderCtrl:list");
        $this->get("/{id:[0-9]+}", "OrderCtrl:searchById");
        $this->post("", "OrderCtrl:insert");
        $this->put("/{id:[0-9]+}", "OrderCtrl:update");
        $this->delete("/{id:[0-9]+}", "OrderCtrl:delete");
    }
);

$app->run();
