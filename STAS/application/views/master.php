<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/coin-slider.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/cufon-aller.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="#"><span>TSAS</span> <small>Welcome to Teacher Student Appointment System</small></a></h1>
      </div>
      <div class="menu_nav">
        <ul>
            <li class="active"><a href="<?php echo base_url();?>welcome/index.html"><span>Home</span></a></li>
            <li><a href="<?php echo base_url();?>welcome/support.html"><span>Help</span></a></li>
           <?php
            $user_id=$this->session->userdata('user_id');
           if($user_id != NULL)
           {
            ?>
           <li><a href="<?php echo base_url();?>welcome/logout.html"><span>Logout</span></a></li>
           <?php } else {?>     
          
                 
          <li><a href="<?php echo base_url();?>welcome/user_signup.html"><span>Sign Up </span></a></li>
          <li><a href="<?php echo base_url();?>welcome/user_login.html"><span>Login</span></a></li>
           <?php } ?>
        </ul>
      </div>
      <div class="clr"></div>
      <?php 
        if($slider)
        {
      ?>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="<?php echo base_url();?>img/slide1.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="<?php echo base_url();?>img/slide2.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="<?php echo base_url();?>img/slide3.jpg" width="935" height="307" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
        <?php } ?>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <?php echo $maincontent;?>
      </div>
      <div class="sidebar">
         
        <div class="searchform">
             <h3><?php 
             if($user_id)
             {
             echo 'Hello, ' . $this->session->userdata('user_name');
             echo '<hr/>';
             }
             
             ?></h3>
          
          <?php 
        if($search)
        {
        ?>
             
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
              <input type="submit" name="btn" value="Search"/>
          </form>
        </div>
        <?php } ?>
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star">Academic Info</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php
            foreach($all_published_category as $v_category)
            {
            ?>
              <li><a href="<?php echo base_url();?>welcome/blog_by_category/<?php echo $v_category->category_id;?>"><?php echo $v_category->category_name;?></a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Recent Info</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <?php 
            foreach($recent_blog as $v_blog){
            ?>
              <li><a href="<?php echo base_url();?>welcome/blog_details/<?php echo $v_blog->blog_id;?>"><?php echo $v_blog->blog_title;?></li>
            <?php
            };
            ?>
          </ul>
        </div>
         <div class="gadget">
          <h2 class="star"><span>Upcoming Info</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <?php 
            foreach($populer_blog as $v_blog){
            ?>
              <li><a href="<?php echo base_url();?>welcome/blog_details/<?php echo $v_blog->blog_id;?>"><?php echo $v_blog->blog_title;?></li>
            <?php
            };
            ?>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui.</p>
        <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
          <span>Telephone:</span> +123-1234-5678<br />
          <span>FAX:</span> +458-4578<br />
          <span>Others:</span> +301 - 0125 - 01258<br />
          <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
      <p class="rf">Design by Dream <a href="http://www.dreamtemplate.com/">Web Templates</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
