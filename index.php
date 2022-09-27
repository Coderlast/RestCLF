<?php

use Ahc\Jwt\JWT;

require "vendor/autoload.php";


$request = explode("/",$_GET['q']);

$CLR = new auth\authClass();

$requestMethod = $request[0];

$mysql = new MysqliDb(HOSTNAME, USERNAME, PASSWORD, DATABASE);

$jwt = new JWT('secret');



if ($requestMethod == "login")
{

    $login = $_POST['login'];
    $password = $_POST['password'];

    $mysql->where('login', $_POST['login']);
    $mysql->where('password', $_POST['password']);
    $data = $mysql->get('users');

    if (!$data)
    {
        header('HTTP/1.0 400 Bad Request');
        echo json_encode(['error' => 400, 'message' => 'Bad Request'], JSON_UNESCAPED_UNICODE);
    }
    else {

        header("HTTP/1.1 200 OK");
        $error = false;
        $message = "Message: Successfully";

        $token = $jwt->encode([
            'user_id' => $data[0]['id'],
            'siteName' => SITE_NAME,
            'userDetails' => $data,
            'api'=> SITE_API_URL
        ]);

        $mysql->where('id', $data[0]['id']);

        $mysql->update('users', [
            'token' => $token
        ]);

        $mysql->where('login', $_POST['login']);
        $mysql->where('password', $_POST['password']);
        $data = $mysql->get('users');

        echo json_encode(['error' => false, 'message' => 'OK!','data' => $data], JSON_UNESCAPED_UNICODE);

    }
}



elseif ($CLR->Auth() == "Accept"){
    echo true;
}

elseif ($CLR->Auth() == "No Authorizations"){
    header('HTTP/1.1 401 Unauthorized');
}
