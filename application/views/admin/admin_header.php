<!DOCTYPE html>
<html>
<head>
	<title>Article list</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

</head>
<body>

<nav class="navbar navbar-inverse">

  <div class="container-fluid">
  <?php $attributes = array('class' => 'form-horizontal', 'id' => 'form-horizontal');

echo form_open('admin/search_article',$attributes);?>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panal</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">

          <?php echo form_input(['type'=>'text','name'=>'title','class'=>'form-control','placeholder'=>'title-search','value' => set_value('title-search')])?>
          
        </div>

        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit'])?>
        
     </form>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="<?php echo base_url('login/logout')?>">Logout</a></li>

      </ul>
    </div>
  </div>
</nav>