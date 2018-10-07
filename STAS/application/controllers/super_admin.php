<?php
session_start();
class Super_Admin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('admin','refresh');
        }
        $this->load->model('super_admin_model');
    }
    
    public function index()
    {
        $data=array();
        $data['admin_maincontent']=$this->load->view('admin/dashbord','',true);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function add_category()
    {
        $data=array();
        $data['admin_maincontent']=$this->load->view('admin/add_category','',true);
        $this->load->view('admin/admin_master',$data);
    }
    public function save_category()
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_description']=$this->input->post('category_description',true);
        $data['publication_status']=$this->input->post('publication_status',true);
        $this->super_admin_model->save_category_info($data);
        $sdata=array();
        $sdata['message']='Save Category Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_category');
    }
    public function manage_category()
    {
        $data=array();
        $data['all_category']=$this->super_admin_model->select_all_category();
        $data['admin_maincontent']=$this->load->view('admin/category_manager',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function unpublished_category($category_id)
    {
        $this->super_admin_model->unpublished_category_info($category_id);
        redirect('super_admin/manage_category');
    }
    public function published_category($category_id)
    {
        $this->super_admin_model->published_category_info($category_id);
        redirect('super_admin/manage_category');
    }
    public function delete_category($category_id)
    {
        $this->super_admin_model->delete_category_info_by_id($category_id);
        redirect('super_admin/manage_category');
    }
    public function edit_category($category_id)
    {
      $data=array();
      $data['category_info']=$this->super_admin_model->select_category_info_by_id($category_id);
      $data['admin_maincontent']=$this->load->view('admin/edit_category',$data,true);
      $this->load->view('admin/admin_master',$data);  
    }
     public function update_category()
    {
       $data=array();
        $category_id=$this->input->post('category_id',true);
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_description']=$this->input->post('category_description',true);
        $data['publication_status']=$this->input->post('publication_status',true);
        $this->super_admin_model->update_category_info($data,$category_id);
        $sdata=array();
        $sdata['message']='Update Category Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_category/'.$category_id);  
    }
    public function add_blog()
    {
        $data=array();
        $data['all_published_category']=$this->welcome_model->select_published_category();
        $data['admin_maincontent']=$this->load->view('admin/add_blog',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function save_blog()
    {
        $data=array();
        $data['blog_title']=$this->input->post('blog_title',true);
        $data['category_id']=$this->input->post('category_id',true);
        $data['blog_short_description']=$this->input->post('blog_short_description',true);
        $data['blog_long_description']=$this->input->post('blog_long_description',true);
        $data['blog_author_name']=$this->session->userdata('admin_full_name');
        $data['publication_status']=$this->input->post('publication_status',true);
        $this->super_admin_model->save_blog_info($data);
        $sdata=array();
        $sdata['message']='Save Blog Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_blog');
    }
    public function blog_manager()
    {
       $data=array();
        $data['all_blog']=$this->super_admin_model->select_all_blog();
        $data['admin_maincontent']=$this->load->view('admin/blog_manager',$data,true);
        $this->load->view('admin/admin_master',$data);
    
    }
    public function comments_manager()
    {
       $data=array();
        $data['all_blog']=$this->super_admin_model->select_all_blog();
        $data['all_comments']=$this->super_admin_model->select_all_comments();
        $data['admin_maincontent']=$this->load->view('admin/comments_manager',$data,true);
        $this->load->view('admin/admin_master',$data);
    
    }
      public function unpublished_blog($blogger_id)
    {
        $this->super_admin_model->unpublished_blog_info($blogger_id);
        redirect('super_admin/blog_manager');
    }
    public function published_comments($comments_id)
    {
        $this->super_admin_model->published_comments_info($comments_id);
        redirect('super_admin/comments_manager');
    }
      public function unpublished_comments($comments_id)
    {
        $this->super_admin_model->unpublished_comments_info($comments_id);
        redirect('super_admin/comments_manager');
    }
    public function published_blog($blogger_id)
    {
        $this->super_admin_model->published_blog_info($blogger_id);
        redirect('super_admin/blog_manager');
    }
    public function delete_blog($blogger_id)
    {
      $this->super_admin_model->delete_blog_info_by_id($blogger_id);
      redirect('super_admin/blog_manager'); 
      
    }
    public function delete_comments($comments_id)
    {
      $this->super_admin_model->delete_comments_info_by_id($comments_id);
      redirect('super_admin/comments_manager'); 
      
    }
   
     public function edit_blog($blog_id)
    {
      $data=array();
      $data['blog_info']=$this->super_admin_model->select_blog_info_by_id($blog_id);
      $data['all_published_category']=$this->welcome_model->select_published_category();
      $data['admin_maincontent']=$this->load->view('admin/edit_blog',$data,true);
      $this->load->view('admin/admin_master',$data);  
    }
   public function update_blog()
   {
        $data=array();
        $blog_id=$this->input->post('blog_id',true);
        $data['blog_title']=$this->input->post('blog_title',true);
        $data['category_id']=$this->input->post('category_id',true);
        $data['blog_short_description']=$this->input->post('blog_short_description',true);
        $data['blog_long_description']=$this->input->post('blog_long_description',true);
        $data['publication_status']=$this->input->post('publication_status',true);
        $this->super_admin_model->update_blog_info($data,$blog_id);
        $sdata=array();
        $sdata['message']='Update blog Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_blog/'.$blog_id);  
   }
   

    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_full_name');
        $sdata=array();
        $sdata['message']='You are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect('admin/index');
    }
}
