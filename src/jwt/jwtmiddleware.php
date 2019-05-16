<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class JwtMiddleware {
    public function __invoke(Request $request, Response $response, callable $next) : Response
    {
        $token = $request->getAttribute("jwt");

        $response = $next($request, $response);
        return $response;
    }
}

?>