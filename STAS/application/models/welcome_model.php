<?php
class Welcome_Model extends CI_Model {
    //put your code here
    
    public function select_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
     public function select_published_comments($blog_id)
    {
        $sql="SELECT u.*,c.* FROM tbl_comments as c,tbl_user as u WHERE c.user_id=u.user_id AND c.blog_id=$blog_id AND c.publication_status=1";
        $query_result=$this->db->query($sql); 
        $result=$query_result->result();
        
        
        return $result; 
    }
    public function select_published_blog()
    {
         $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function select_published_blog_by_category_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
    public function select_blog_by_id($blog_id)
    {
       $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->where('blog_id',$blog_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;  
    }
    public function select_recent_blog()
    {
       $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->order_by('blog_id','desc');
        $this->db->limit(3);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
    public function save_user_info($data)
    {
        $this->db->insert('tbl_user',$data);
    }
    public function check_user_login_info($email_address,$password)
    {
     $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address',$email_address);
        $this->db->where('password',md5($password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;      
    }
    public  function save_comments_info($data)
    {
        $this->db->insert('tbl_comments',$data);
    }
    public function update_hit_count($hit_count,$blog_id)
    {
        $this->db->set('hit_count',$hit_count);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
        
    }
    public function select_populer_blog()
    {
        $sql="SELECT * FROM tbl_blog ORDER BY hit_count DESC LIMIT 0,3";
        $query_result=$this->db->query($sql);
        $result=$query_result->result();
        return $result;   
    }
    public function select_user_by_email($email_address)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address',$email_address);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
}
