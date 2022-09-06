<?php

namespace Rest\Api;
use Ahc\Jwt\JWT;
use MysqliDb;


class outCon
{
    public $data;
    /**
     * @var \DBPDO
     */
//    public $database = new \DBPDO();
    function __construct($getData)
    {
        $this->data = $getData;
    }

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
        $mysql = new MysqliDb('localhost', 'coderlast', '2537121Uz', 'user40091_baza');
        $jwt = new JWT('secret', 'HS256', 3600, 10);
        $token = $this->getAuthorizationHeader();
        $explode = explode(" ", $token);
        if ($explode[0] == "Bearer"){
            $token = $explode[1];
            $data = $jwt->decode($token);
            if(!$data){
//                echo json_encode(['error'=>true,'message' => 'user not found','data'=>$data], JSON_UNESCAPED_UNICODE);
                return false;
            }else{
                $mysql->where('id', $data['user_id']);
                $mysql->update('users', [
                    'last_update'=> date('Y-m-d H-m-s')
                ]);
//                echo json_encode(['error'=>true,'message' => 'tasdiqlandi'], JSON_UNESCAPED_UNICODE);
                return true;
            }
        }
    }

}