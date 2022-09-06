<?php

require "config.php";
use Rest\Api\outCon;
header('Content-Type: application/json');

use Ahc\Jwt\JWT;

$jwt = new JWT('secret', 'HS256', time() + 3600, 10);;


$database = new DBPDO();
$mysql = new MysqliDb(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
$restApi = new outCon($jwt);

$table = $_GET['q'];
$explode = explode("/", $table);
$type = $explode[0];
if ($type == "login")
{

    $login = $_POST['login'];
    $password = $_POST['password'];

    $ex = explode("/", $table);
    $mysql->where('login', $_POST['login']);
    $mysql->where('password', $_POST['password']);
    $data = $mysql->get('users');

    if (!$data)
    {
        header('HTTP/1.0 400 Bad Request');
        echo json_encode(['error' => 400, 'message' => 'Bad Request',], JSON_UNESCAPED_UNICODE);
    }
    else {

        header("HTTP/1.1 200 OK");
        $error = false;
        $message = "Kirish tasdiqlandi";

        $token = $jwt->encode([
            'user_id' => $data[0]['id'],
            'adress' => 'http://realtordubai.top',
            'scopes' => ['user'],
            'iss' => 'http://api.realtordubai.top',
        ]);

        $mysql->where('id', $data[0]['id']);
        $mysql->update('users', [
            'token' => $token
        ]);

        sleep(1);
//
        $mysql->where('login', $_POST['login']);
        $mysql->where('password', $_POST['password']);
        $data = $mysql->get('users');

        echo json_encode(['error' => false, 'message' => 'OK!','data' => $data], JSON_UNESCAPED_UNICODE);

    }
}


elseif($restApi->Auth()){
    if ($type == 'users')
    {

        $method = $explode[1];

        if ($method == 'addUser')
        {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $typ = $_POST['type'];
            $time = date('Y-m-d H:m:s');
            $data = ['name' => $name, 'login' => $login, 'password' => $password, 'type' => $typ, 'created_at' => $time, ];

            $id = $mysql->insert('users', $data);
            if ($id)
            {
                echo json_encode(['error' => false, 'message' => "Ro'hatga olindi", 'user' => ['id' => $id, 'name' => $name, 'login' => $login, 'password' => $password, 'type' => $typ, 'status' => 'active', 'created_at' => $time, ]]);
            }
            else
            {
                echo json_encode(['error' => true, 'message' => "Barcha ma'lumotlar to'ldirilmadi"]);
            }
            //    users/add?name=regtest&login=coder_uz&password=parolim&type=fulladmin

        }

        elseif ($method == 'update')
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $typ = $_POST['type'];
            $time = date('Y-m-d H:m:s');
            $data = array(
                'name' => $name,
                'login' => $login,
                'password' => $password,
                'type' => $typ,
                'updated_at' => $time,
            );
            $mysql->where('id', $id);
            $id = $mysql->update('users', $data);
            if ($id)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }

        elseif ($method == 'delete')
        {
            $id = $explode[2];

            $mysql->where('id', $id);
            $id = $mysql->delete('users');
            //        print_r([$id,$_SERVER['REQUEST_METHOD']]);
            if ($id)
            {
                echo json_encode(['error' => false, 'message' => "Malumotlar o'chirildi", ]);
            }
            else
            {
                echo json_encode(['error' => true, 'message' => "Barcha ma'lumotlar to'ldirilmadi"]);
            }
        }

        else
        {
            $id = $explode[1];
            $login = $explode[2];
            if (isset($login) & $login !== '')
            {
                $data = $database->fetchAll("SELECT * FROM users WHERE  login = '{$login}' ");
            }
            elseif (isset($id))
            {
                $data = $database->fetchAll("SELECT * FROM users WHERE id = {$id}");
            }
            elseif ($id == "0")
            {
                $data = ['result' => "error ban"];
            }
            else
            {
                $data['data'] = $database->fetchAll("SELECT * FROM users");
            }
            echo json_encode(['error' => '', 'message' => "", 'data' => $data], JSON_PRETTY_PRINT);
        }
    }
}
