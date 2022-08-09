<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

// Load Model
use App\Models\SettingsModel;

class Settings extends AdminController
{


    public function __construct()
	{
        parent::__construct();

		// Loading db instance
		$this->db = db_connect();
		// Loading Query builder instance
		$this->builder = $this->db->table("settings");
	}


    public function index()
    {
        $data = array( 
           'pageTitle' => 'MCS-Settings',             
        );

        $this->postChecker();

        //Fetch Data
        $model = new SettingsModel();
        $value_stores = $model->findAll(); 

        if(!is_null($value_stores)) {
           // Map to data
           foreach($value_stores as $value_s) {
               if (!array_key_exists($value_s['key'], $data)) {
                
                    $data[$value_s['key']] = $value_s['value'];
               }

            }
           unset($value_stores);
       }

       $this->render_view('admin/pages/settings',$data);
       


    }



    private function postChecker(){
      
        if (isset($_POST['siteTitle'])) {
        
            $model = new SettingsModel();

             $data = $this->request->getVar('siteTitle');

             $key = 'site_title';
        
            $this->updateKeyValue('site_title', $data);       

            $session = session();
            $session->setFlashdata('siteTitle', 'Updated');
             return redirect()->to(base_url('settings'));
        }


        if (isset($_POST['siteFooter'])) {
        
            $model = new SettingsModel();

             $data = $this->request->getVar('siteFooter');

             $key = 'site_title';
        
            $this->updateKeyValue('site_footer', $data);       

            $session = session();
            $session->setFlashdata('siteFooter', 'Updated');
             return redirect()->to(base_url('settings'));
        }


    }


    public function updateKeyValue(string $key, string $value) {
        $this->builder->set('value', $value)                       
                        ->where('key', $key)
                        ->update();
      }



}
