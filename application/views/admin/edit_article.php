<?php include('admin_header.php');?>



<div class=container>
<!-- <form class="form-horizontal"> -->

<?php $attributes = array('class' => 'form-horizontal', 'id' => 'form-horizontal');

echo form_open('admin/update_article',$attributes);
echo form_hidden('id',$article[0]['id']);?>
  <fieldset>
<!--   	<Login>Admin Login</Login> -->

	
	<div class="form-group">
		<div class="col-lg-14 ">
	    
	  Edit Article
		
		</div>
		</div>
    <?php if ($msg=$this->session->flashdata('Edit_success')){ ?>
    <div class="form-group">
		<div class="col-lg-8">
	    <div class="alert alert-dismissible alert-success">
	  <strong><?= $msg?></strong> 
		</div>
		</div>
		</div>

    <?php }?>
    <div class="form-group">
    
      <label for="inputEmail" class="col-lg-2 control-label">Article Title</label> 
      <div class="col-lg-4">
      <?php echo form_input(['name'=>'title','class'=>'form-control','id'=>'title','placeholder'=>'title','value' => set_value('title',$article[0]['title'])])?>      
<!--         <input type="text" class="form-control" id="inputEmail" placeholder="User name"> -->
      </div>
      <div class="col-lg-4">
      <?php echo form_error('title')?>      
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-4">
      <?php echo form_textarea(['name'=>'body','class'=>'form-control','id'=>'body','placeholder'=>'body','value' => set_value('body',$article[0]['body'])])?>      
<!--         <input type="text" class="form-control" id="inputEmail" placeholder="User name"> -->
      </div>
      <div class="col-lg-4">
      <?php echo form_error('body')?>      
      </div>
    </div>
    
    
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']),
			      form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit'])?>
<!--         <button type="reset" class="btn btn-default">Cancel</button> -->
		
<!--         <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </fieldset>
<!-- </form> -->


</div>
 <?php //print_r($article[0]['body'] ) ;?>

<?php include('admin_footer.php');?>