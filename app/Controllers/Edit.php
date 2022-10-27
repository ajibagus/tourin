<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
class Edit extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

   
    public function update($id = null)
    {
        $model = new UserModel();
        $data = $model->findAll();
        helper(['form']);
        $rules = $this->validate([
            'username' => 'required'
        ]);

        if (!$rules){
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        };

        $data = [
            'username'  => $this->request->getVar('username')
        ];
        $model = new UserModel();
        $update = $model->update($id,$data);
        $response_success= [
            'code' =>200,
            'message' => 'Success Updated'
            ];
        return $this->respond($response_success);
    }

}
