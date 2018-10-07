<div>
<div class="article">
    <span style="font-size: 18px"><?php echo $blog_info->blog_title;?></span>
          <p class="infopost">Posted on <span class="date"><?php echo $blog_info->created_date_time;?></span> by <a href="#"><?php echo $blog_info->blog_author_name;?></a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a> <a href="#" class="com">Comments <span>11</span></a></p>
          <div class="clr"></div>
          
          <div class="post_content">
            <?php echo $blog_info->blog_long_description;?>
             <!-- <p class="spec"><a href="<?php //echo base_url();?>welcome/blog_!details/<?php// echo $v_blog->blog_id;?>" class="rm">Read more &raquo;</a></p> -->
          </div>
          <div class="clr"></div>
        </div>
   
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
        
        
        <!--comments start-->
        <div class="article">
          <h2><span>3</span> Responses</h2>
          <div class="clr"></div>
          <?php foreach ($all_published_comments as $v_comments){ ?>
          <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
              <p><a href="#"><?php echo $v_comments->user_name;?></a> :<br />
             <?php echo $v_comments->created_date_time;?></p>
            <p align='center'><?php echo $v_comments->comments;?></p>
          </div>
          <?php };?>
         
        </div>
        <?php
            $user_id=$this->session->userdata('user_id');
            if($user_id)
            {
        ?>
        <div class="article">
            <h3 style="color:yellowgreen">
                <?php
                    $msg=$this->session->userdata('message');
                    if($msg)
                    {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                ?>
            </h3>
            
          <h2><span>Leave a</span> Reply</h2>
          <div class="clr"></div>
          <form action="<?php echo base_url();?>welcome/save_comments" method="post" id="leavereply">
            <ol>
              
              <li>
                <label for="message">Your Comments</label>
                <input type="hidden" name="blog_id" value="<?php echo $blog_info->blog_id;?>">
                <textarea id="message" name="comments" rows="8" cols="50"></textarea>
              </li>
              <li>
                  <input type="submit" name="btn" value="Post Your Comments" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
            <?php } ?>
      </div>