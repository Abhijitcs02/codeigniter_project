<?php include('admin_header.php');?>



<div class=container>
<!-- <form class="form-horizontal"> -->

<?php $attributes = array('class' => 'form-horizontal', 'id' => 'form-horizontal');

echo form_open('admin/store_article',$attributes);
echo form_hidden('user_id',$this->session->userdata('user_id'));?>
  <fieldset>
<!--   	<Login>Admin Login</Login> -->

	
	<div class="form-group">
		<div class="col-lg-14 ">
	    
	  Add Article
		
		</div>
		</div>
	
	    
	
    <?php if ($error=$this->session->flashdata('Insertion_failed')){ ?>
    <div class="form-group">
		<div class="col-lg-8">
	    <div class="alert alert-dismissible alert-danger">
	  <strong><?= $error?></strong> 
		</div>
		</div>
		</div>

    <?php }?>
    <div class="form-group">
    
      <label for="inputEmail" class="col-lg-2 control-label">Article Title</label> 
      <div class="col-lg-4">
      <?php echo form_input(['name'=>'title','class'=>'form-control','id'=>'title','placeholder'=>'title','value' => set_value('title')])?>      
<!--         <input type="text" class="form-control" id="inputEmail" placeholder="User name"> -->
      </div>
      <div class="col-lg-4">
      <?php echo form_error('title')?>      
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-4">
      <?php echo form_textarea(['name'=>'body','class'=>'form-control','id'=>'body','placeholder'=>'body','value' => set_value('body')])?>      
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


<?php include('admin_footer.php');?>