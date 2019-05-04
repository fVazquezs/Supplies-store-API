<?php

require_once "src/PDOFactory.php";
require_once "src/department/DepartmentCtrl.php";
require_once "src/product/ProductCtrl.php";

// require_once "jwt/jwtauth.php";
// require_once "jwt/jwtmiddleware.php";

require "vendor/autoload.php";

$config = ['settings'=> [
        'displayErrorDetails' => true
    ],
];

// passar a variável $config como parâmetro da instância do Slim
$app = new \Slim\App($config);

// agrupamento para organizar o web service chamando os métodos do controller
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

$app->run();
