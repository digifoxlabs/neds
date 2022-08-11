<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'c_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "customer_id",
        "name",
        "gender",
        "community",
        "maritial_status",
        "dob",
        "disability",
        "disability_pcn",
        "res_hno",
        "res_street",
        "res_district",
        "res_adminunit",
        "res_unit_name",
        "res_city",
        "res_contact",
        "res_email",
        "ofc_hno",
        "ofc_street",
        "ofc_district",
        "ofc_adminunit",
        "ofc_unit_name",
        "ofc_city",
        "ofc_contact",
        "ofc_email",
        "ration_card",
        "iden_1",
        "iden_2",
        "status",    
    ];

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
}
