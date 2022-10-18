<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RateModel;
class Rate extends ResourceController
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
        $data = [
            'id_rate'     => $this->request->getVar('id_rate'),
            'kode_user'     => $this->request->getVar('kode_user'),
            'kode_wisata'  => $this->request->getVar('kode_wisata'),
            'rate_value'  => $this->request->getVar('rate_value'),
            'time'  => $this->request->getVar('time'),
        ];
        $model = new RateModel();
        $savedata = $model->save($data);
        $response_success= [
            'code' =>200,
            'message' => 'Save Data Succes'
            ];
        return $this->respond($response_success);
    }

}
