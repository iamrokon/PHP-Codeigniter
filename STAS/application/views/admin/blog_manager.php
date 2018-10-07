
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Members</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Bloger Id</th>
                        <th>Blog Title</th>
<!--                        <th>Blog Short Description</th>
                        <th>Blog long Description</th>-->
                        <th>Blog Author name</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    foreach($all_blog as $v_blog)
                    {
                    ?>
                    <tr>
                        <td><?php echo $v_blog->blog_id?></td>
                       <td class="center"><?php echo $v_blog->blog_title?></td>
<!--                        <td><?php //echo $v_blog->blog_short_description?></td>
                        <td><?php //echo $v_blog->blog_long_description?></td>-->
                        <td><?php echo $v_blog->blog_author_name?></td>
                        <td class="center">
                            <?php 
                            if($v_blog->publication_status==1)
                            {
                                echo 'Published';
                            }
                            else{
                                echo 'Unpublished';
                            }
                                    
                                    
                                    ?>
                        
                        </td>
                        <td class="center">
                            <?php
                            if($v_blog->publication_status==1)
                            {
                            ?>
                            <a class="btn btn-success" href="<?php echo base_url();?>super_admin/unpublished_blog/<?php echo $v_blog->blog_id?>">
                                <i class="icon-lock icon-white"></i>  
                                                                          
                            </a>
                            <?php } 
                            
                            else{
                            ?>
                            <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/published_blog/<?php echo $v_blog->blog_id?>">
                                <i class="icon-ok icon-white"></i>  
                                                                          
                            </a>
                            <?php } ?>
                            <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_blog/<?php echo $v_blog->blog_id?>" title="Edit">
                                <i class="icon-edit icon-white"></i>  
                                                                            
                            </a>
                            <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_blog/<?php echo $v_blog->blog_id?>" title="Delete" onclick="return checkDelete();">
                                <i class="icon-trash icon-white"></i> 
                                
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->


