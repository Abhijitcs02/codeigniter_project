<?php include('user_hearder.php');?>



<div class=container>
<!-- <form class="form-horizontal"> -->

<?php $attributes = array('class' => 'form-horizontal', 'id' => 'form-horizontal');

echo form_open('login/admin_login',$attributes)?>
  <fieldset>
<!--   	<Login>Admin Login</Login> -->
    <?php if ($error=$this->session->flashdata('login_failed')){ ?>
    <div class="form-group">
		<div class="col-lg-8">
	    <div class="alert alert-dismissible alert-danger">
	  <strong><?= $error?></strong> 
		</div>
		</div>
		</div>

    <?php }?>
    <div class="form-group">
    
      <label for="inputEmail" class="col-lg-2 control-label">User Name</label> 
      <div class="col-lg-4">
      <?php echo form_input(['name'=>'username','class'=>'form-control','id'=>'username','placeholder'=>'Username','value' => set_value('username')])?>      
<!--         <input type="text" class="form-control" id="inputEmail" placeholder="User name"> -->
      </div>
      <div class="col-lg-4">
      <?php echo form_error('username')?>      
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-4">
      <?php echo form_password(['name'=>'password','class'=>'form-control','id'=>'password','placeholder'=>'Password'])?>      
<!--         <input type="text" class="form-control" id="inputEmail" placeholder="User name"> -->
      </div>
      <div class="col-lg-4">
      <?php echo form_error('password')?>      
      </div>
    </div>
    
    
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']),
			      form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login'])?>
<!--         <button type="reset" class="btn btn-default">Cancel</button> -->
		
<!--         <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </fieldset>
<!-- </form> -->


</div>



<?php include('user_footer.php');?>