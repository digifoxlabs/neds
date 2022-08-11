<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

class Customers extends AdminController
{
    public $db;

    public function __construct(){

        parent::__construct();
        $this->db = \Config\Database::connect();

    }

    public function manage()
    {
        $data = array( 
            'pageTitle' => 'MCS-Customers',             
        );

        $this->render_view('admin/pages/customers/manage',$data);


    }

    public function ajaxLoadAllCustomers()
    {
        // echo "HELLO";

        // exit;

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        $valueStatus = isset($_REQUEST['status'])?$_REQUEST['status']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];

        if(!empty($search_value)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data
            $total_count = $this->db->query("SELECT * from customers WHERE customer_id like '%".$search_value."%' OR name like '%".$search_value."%'")->getResult();

            $data = $this->db->query("SELECT * from customers WHERE customer_id like '%".$search_value."%' OR name like '%".$search_value."%' limit $start, $length")->getResult();
        }
        
        else if(!empty($valueStatus)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data
            $total_count = $this->db->query("SELECT * from customers WHERE status=".$valueStatus."")->getResult();

            $data = $this->db->query("SELECT * from customers WHERE status=".$valueStatus."")->getResult();
        }        
        
        else{
            // count all data
            $total_count = $this->db->query("SELECT * from customers")->getResult();

            // get per page data
            $data = $this->db->query("SELECT * from customers limit $start, $length")->getResult();
        }
        
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);       

    



    }




}
