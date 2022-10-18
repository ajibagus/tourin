<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Register extends ResourceController
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
        // validate unique email
        $unique_email = [
            'email' => 'is_unique[users.email]'
        ];
        $response_unique_email = [
            'code' =>401,
            'message' => 'Email Alredy Exist'
            ];
            if(!$this->validate($unique_email)) return $this->respond($response_unique_email);

        // validate email valid with @
        $valid_email =[
            'email' => 'valid_email'
        ];
        $response_valid_email = [
            'code' =>402,
            'message' => 'You have entered an invalid E-mail addres. Please try again'
            ];
            if(!$this->validate($valid_email)) return $this->respond($response_valid_email);


        $data = [
            'email'     => $this->request->getVar('email'),
            'username'     => $this->request->getVar('username'),
            'password'  => password_hash( $this->request->getVar('password'), PASSWORD_BCRYPT)
        ];
        $model = new UserModel();
        $registered = $model->save($data);
        $response_success= [
            'code' =>200,
            'message' => 'Success Register'
            ];
        return $this->respond($response_success);
    }

}
