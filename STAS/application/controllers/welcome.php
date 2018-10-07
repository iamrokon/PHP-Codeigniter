<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $data = array();
        $data['title'] = 'Home';
        $data['slider'] = true;
        $data['search'] = true;
        $data['all_published_blog'] = $this->welcome_model->select_published_blog();
        $data['maincontent'] = $this->load->view('home_content', $data, true);
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $this->load->view('master', $data);
    }

    public function support() {
        $data = array();
        $data['title'] = 'Help';
        $data['slider'] = false;
        $data['search'] = false;
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data['maincontent'] = $this->load->view('support_content', '', true);
        $this->load->view('master', $data);
    }

    public function blog_by_category($category_id) {
        $data = array();
        $data['title'] = 'Category Blog ';
        $data['slider'] = true;
        $data['search'] = true;
        $data['published_blog_by_category'] = $this->welcome_model->select_published_blog_by_category_id($category_id);
        $data['maincontent'] = $this->load->view('category_blog', $data, true);
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();


        $this->load->view('master', $data);
    }

    public function blog_details($blog_id) {
        $data = array();
        $data['title'] = 'Blog Details';
        $data['slider'] = true;
        $data['search'] = true;
        $data['blog_info'] = $this->welcome_model->select_blog_by_id($blog_id);
        $hit_count = $data['blog_info']->hit_count + 1;
        $this->welcome_model->update_hit_count($hit_count, $blog_id);
        $data['all_published_comments'] = $this->welcome_model->select_published_comments($blog_id);
        $data['maincontent'] = $this->load->view('blog_details', $data, true);
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        
        $this->load->view('master', $data);
    }

    public function user_signup() {
        $data = array();
        $data['title'] = 'Home';
        $data['slider'] = true;
        $data['search'] = true;
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data['maincontent'] = $this->load->view('user_signup', $data, true);
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();

        $this->load->view('master', $data);
    }

    public function save_user() {
        $data = array();
        $data['user_name'] = $this->input->post('user_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $data['password'] = md5($this->input->post('password', true));
        $data['age'] = $this->input->post('age', true);
        $user_info=$this->welcome_model->select_user_by_email($data['email_address']);
        if($user_info)
        {
            $sdata = array();
            $sdata['message'] = 'Email Address Alredy Exists ! ';
            $this->session->set_userdata($sdata);
            redirect('welcome/user_signup');
        }
        else{
        $this->welcome_model->save_user_info($data);
        
        $sdata = array();
        $sdata['message'] = 'save user information successfully';
        $this->session->set_userdata($sdata);
        redirect('welcome/user_signup');
        }
    }

    public function user_login() {
        $data = array();
        $data['title'] = 'Home';
        $data['slider'] = true;
        $data['search'] = true;

        $data['maincontent'] = $this->load->view('user_login', $data, true);
        $data['all_published_category'] = $this->welcome_model->select_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $this->load->view('master', $data);
    }

    public function check_user_login() {
        $email_address = $this->input->post('email_address');
        $password = $this->input->post('password');

        $result = $this->welcome_model->check_user_login_info($email_address, $password);
        $sdata = array();
        if ($result) {

            $sdata['user_name'] = $result->user_name;
            $sdata['email_address'] = $result->email_address;
            $sdata['user_id'] = $result->user_id;
            $this->session->set_userdata($sdata);
            redirect('welcome');
        } else {
            $sdata['message'] = 'User Id / Password Invalide';
            $this->session->set_userdata($sdata);
            redirect('welcome/user_login');
        }
    }

    public function save_comments() {
        $data = array();
        $data['blog_id'] = $this->input->post('blog_id', true);
        $data['user_id'] = $this->session->userdata('user_id');
        $data['comments'] = $this->input->post('comments', true);
        $this->welcome_model->save_comments_info($data);
        $sdata = array();
        $sdata['message'] = 'Your Comments Successfully Save and Waiting For admin Approval';
        $this->session->set_userdata($sdata);
        redirect('welcome/blog_details/' . $data['blog_id']);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_email');
        redirect('welcome');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */