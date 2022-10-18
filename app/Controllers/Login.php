<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        // validation email valid with @
        $valid_email = [
            'email' => 'valid_email',
        ];
        $response_valid_email = [
            'code' =>'402',
            'message' => 'You have entered an invalid E-mail addres. Please try again',
            'id' => '',
            'username' => '',
            'email' => '',
            'token' => ''
            ];
        if(!$this->validate($valid_email)) return $this->respond($response_valid_email);

        // validation user not registered
        $response_email_not_found = [
            'code' =>404,
            'message' => 'Email Not Found',
            'id' => '',
            'username' => '',
            'email' => '',
            'token' => ''
            ];
        $model = new UserModel();
        $user = $model->where("email",$this->request->getVar('email'))->first();
        if(!$user) return $this->respond($response_email_not_found);

        // validation password
        $response_wrong_password = [
            'code' =>405,
            'message' => 'Wrong Password',
            'id' => '',
            'username' => '',
            'email' => '',
            'token' => ''
            ];
        $verify = password_verify($this->request->getVar('password'),$user['password']);
        if(!$verify) return $this->respond($response_wrong_password);

        $key = getenv('TOKEN_SECRET');
        $payload = [
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'uid' => $user['id_user'],
            'email' => $user['email']
        ];
        $token = JWT::encode($payload, $key, 'HS256');

        $response_success = [
            'code' =>200,
            'message' => 'Login Success',
            'id' =>(int)$user['id_user'],
            'username' => $user['username'],
            'email' => $user['email'],
            'token' => $token
            ];
        
        return $this->respond($response_success);
        
    }
}