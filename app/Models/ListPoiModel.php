<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPoiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'list_poi';
    protected $primaryKey       = 'id_poi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_fasilitas','kode_wisata','lat','longi','nama_fasilitas'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // public function getData()
    // {
    //      $this->db->table('list_wisata.id_wisata, list_poi.nama_fasilitas, list_poi.lat,list_poi.longi')
    //      ->from('list_poi')
    //      ->join('list_wisata', 'list_wisata.id_wisata=list_poi.kode_wisata')
    //      ->get()->getResultArray();  
    // }
}
