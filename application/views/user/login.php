<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Login</title>
</head>
<body class="userbground">
<div class="user">
<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?>
<?php endif; ?>
<?php echo form_open(); ?>
<br/>
<?php $this->load->helper('url');  ?>
<?php echo form_label('Email cím:','userEmail'); ?> <br/>
<?php echo form_input('userEmail',set_value('userEmail',''),[ 'id' => 'userEmail',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('productName');?>
<br/>
<br/>
<?php echo form_label('Jelszó:','userPassword'); ?> <br/>
<?php echo form_password('userPassword',set_value('userPassword',''),[]); ?>
<?php echo form_error('userPassword'); ?>
<br/>
<br/>
<div class="loginBtn">
<?php echo form_submit('submit','Belépés'); ?>
</div>
<br/>
<br/>
<p>Amennyiben még nem regisztráltál <?php echo anchor(base_url('user/register/'),'itt megteheted!');?></p>


<?php echo form_close(); ?>
</div>
</body>

