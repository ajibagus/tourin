<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ListWisataModel;
use App\Models\ListPoiModel;

class Poi extends ResourceController
{
    use ResponseTrait;
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new ListPoiModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($kode = null)
    {
        //$model = new ListWisataModel();
        $model = new ListPoiModel();
        $data = $model->getWhere(['kode_wisata' => $kode])->getResult();
        #$data2 = $model->where('kode_wisata', $kode)->find();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$kode);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
   
}
