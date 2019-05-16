<?php

use \Tuupola\Middleware\JwtAuthentication;

function jwtAuth() : JwtAuthentication {

    return new JwtAuthentication(
        [
            'secret' => "sT0r3",
            'attribute' => 'jwt',
            'secure' => false,
            'relaxed' => ['localhost', 'supplies-store.herokuapp.com'],
            'error' => function($response, $args) {
                $data['status'] = 'error';
                $data['message'] = $args['message'];
                return $response
                    ->withHeader("Content-type", "application/json")
                    ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            }
        ]
        );
}

?>
