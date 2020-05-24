<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Add admin</title>
</head>
<body class="userbground">
<div class="user">
<?php if($this->session->userdata('admin')): ?>
<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?>
<?php endif; ?>
<?php echo form_open(); ?>
<br/>
<?php echo form_label('Email cím:','adminEmail'); ?> <br/>
<?php echo form_input('adminEmail',set_value('adminEmail',''),[ 'id' => 'adminEmail',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('adminEmail');?>
<br/>
<br/>

<?php echo form_label('Adminisztrátor név:','adminName'); ?> <br/>
<?php echo form_input('adminName',set_value('adminName',''), [ /*'required' => 'requried',*/ 
                                  ]); ?>
<?php echo form_error('adminName'); ?>
<br/>
<br/>
<?php echo form_label('Jelszó:','adminPassword'); ?> <br/>
<?php echo form_password('adminPassword',set_value('adminPassword',''),[]); ?>
<?php echo form_error('adminPassword'); ?>
<br/>
<br/>


<?php echo form_submit('submit','Regisztáció'); ?>
<br/>

<?php echo form_close(); ?>
<?php else: 
    echo 'Először jelentkezzen be';
?>

<?php endif; ?>