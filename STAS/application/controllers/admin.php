<?php
session_start();
class Admin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id !=NULL)
        {
            redirect('super_admin','refresh');
        }
    }
    
    public function index()
    {
        $this->load->view('admin/login');
    }
    public  function admin_login_check()
    {
        $admin_email_address=$this->input->post('admin_email_address',true);
        $admin_password=$this->input->post('admin_password',true);
        $this->load->model('admin_model');
       $result= $this->admin_model->check_admin_login_info($admin_email_address,$admin_password);
//       echo '<pre>';
//       print_r($result);
//       exit();
       $sdata=array();
       if($result)
       {
           $sdata['admin_id']=$result->admin_id;
           $sdata['admin_full_name']=$result->admin_full_name;
           $this->session->set_userdata($sdata);
           redirect('super_admin');
       }
       
       else{
           $sdata['message']='User Id Or Password Invalide !';
           $this->session->set_userdata($sdata);
           redirect('admin/index');
       }
       
    }
    
}
