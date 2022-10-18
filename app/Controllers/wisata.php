<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ListWisataModel;
use App\Models\ListPoiModel;

class Wisata extends ResourceController
{
    use ResponseTrait;
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model  = new ListWisataModel();
        $model2 = new ListPoiModel(); 
        $data  = $model->findAll();
        #$data2 = $model2->findAll();
        // $alldata =[
        //     'data1' =>$data,
        //     'data2' =>$data2
        // ];
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ListWisataModel();
        $data = $model->find($id);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    
}
