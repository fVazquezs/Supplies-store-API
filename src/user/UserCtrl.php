<?php
require_once "User.php";
require_once "UserDAO.php";

use \Firebase\JWT\JWT;

class UserCtrl
{
    private $secretkey = "sT0r3";

    public function authenticate($req, $resp, $args)
    {
        $var = $req->getParsedBody();

        $dao = new UserDAO();

        $user = $dao->searchByEmail($var["email"]);

        if ($user->password == $var["password"]) {
            $tokenpayload = array(
                "user_id" => $user->id,
                "user_name" => $user->name
              //  "login_datetime" => new DateTime('now', new DateTimeZone('America/Sao_paulo'))
            );

            $token = JWT::encode($tokenpayload, $this->secretkey);

            return $resp->withJson(["token" => $token]);
        } else {
            return $resp->withJson(401);
        }
    }

    public function list($req, $resp, $args)
    {
        $dao = new UserDAO();
        $list = $dao->list();
        $resp = $resp->withJson($list);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000/");
        return $resp;
    }

    public function searchById($req, $resp, $args)
    {
        $id = (int) $args["id"];
        $dao = new UserDAO();
        $user = $dao->searchById($id);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000/");
        return $resp;
    }

    public function insert($req, $resp, $args)
    {
        $var = $req->getParsedBody();
        $user = new User(0, $var["name"], $var["email"], $var["password"], $var["departmentId"]);
        $dao = new UserDAO();
        $dao->insert($user);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000/");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function update($req, $resp, $args)
    {
        $id = (int) $args["id"];
        $var = $req->getParsedBody();
        $user = new User($id, $var["name"], $var["email"], $var["password"], $var["departmentId"]);
        $dao = new UserDAO();
        $dao->update($user);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }

    public function delete($req, $resp, $args)
    {
        $id = (int) $args["id"];
        $dao = new UserDAO();
        $user = $dao->searchById($id);
        $dao->delete($id);
        $resp = $resp->withJson($user);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withHeader("Access-Control-Allow-Origin", "http://localhost:3000");
        return $resp;
    }
}
