<?php include('admin_header.php');?>



<div class="btn-group btn-group-justified">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-6">
			<a href=<?php echo base_url('admin/add_article')?> class="btn btn-primary btn-sm pull-right">Add Articles</a>		
		</div>
	</div>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Titles</th>
      <th>Article Body</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php if ($articles == FALSE){?>
	
		<tr>
		<td colspan = '4'>
	    		No Records Found.
	    	</td>
	    </tr>		
    <?php }else{?>
    <?php $Srno = 1?>
	<?php foreach ($articles as $article){?>
    <tr>
      <td><?= $Srno;$Srno++;?></td>
      <td><?= $article->title ;?></td>
      <td><?= $article->body; ?></td>
      <td>
      
      <a href=<?php echo base_url('admin/edit_article/'.$article->id)?> class="btn btn-primary">Edit</a>
      <a href=<?php echo base_url('admin/delete_article/'.$article->id)?> class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php } ?>
    <?php }?>


  </tbody>
</table> 
</div>

<?php if ($error=$this->session->flashdata('Update_success')){ ?>
    <div class="form-group">
		<div class="col-lg-8">
	    <div class="alert alert-dismissible alert-success">
	  <strong><?= $error?></strong> 
		</div>
		</div>
		</div>

    <?php }?>

<?php if ($msg=$this->session->flashdata('Edit_success')){ ?>
    <div class="form-group">
		<div class="col-lg-8">
	    <div class="alert alert-dismissible alert-success">
	  <strong><?= $msg?></strong> 
		</div>
		</div>
		</div>

    <?php }?>

<?php include('admin_footer.php');?>