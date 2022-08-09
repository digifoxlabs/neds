<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
    public function __construct(){

        parent::__construct();

    }


    public function index()
    {

        // if(!in_array('updateAllO', $this->permission) ) {
        //     echo "OK ARRAY";
        // }


        $data = array( 
            'pageTitle' => 'MCS-Dashboard',             
        );

       // return view('admin/pages/dashboard', $data);

       $this->render_view('admin/pages/dashboard',$data);
        


    }
}
