<?php


namespace auth;

use Ahc\Jwt\JWT;
use MysqliDb;

class authClass
{

    public function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }



    public function Auth(){
        $mysql = new MysqliDb(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        $jwt = new JWT('secret', 'HS256', 3600, 10);
        $token = $this->getAuthorizationHeader();
        $explode = explode(" ", $token);
        if ($explode[0] == "Bearer"){
            $token = $explode[1];
            if ($token){
                $data = $jwt->decode($token);
                if(!$data){
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(['error' => 'Invalid', 'message' =>'Message : Invalid User credentials']);
                }else{
                    $mysql->where('id', $data['user_id']);
                    $userData = $mysql->get('users');
                    if ($userData){
                        return "Accept";
                    }else{
                        return  "No Authorizations";
                    }
                }
            }else{
                return "No tokens";
            }

        }
    }


    public function getAuthorizationToken(){
        $token = $this->getAuthorizationHeader();
        $explode = explode(" ", $token);
        if ($explode[0] == "Bearer") {
            $token = $explode[1];
            return $token;
        }
    }


}