<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Summary</title>
</head>
<body class="userbground">
<?php if($this->session->userdata('email')): ?>
    <div class="list">
    <div class="action">
<div class="centermenu">
<?php echo anchor(base_url('products/userList'),'Termékek'); ?>

<?php echo anchor(base_url('user/show_cart'),'Kosaram');?>
    <?php echo anchor(base_url('user/logout/'),'Kilépés');?>
</div>
</div>
    <p class="summtitle">Szállítási adatok</p>
<div class="user">
<?php echo form_open_multipart() ?>
<?php echo form_input('email',set_value('email',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Email cím']); ?>
<?php echo form_error('email'); ?>
<br/>
<br/>
<?php echo form_input('firstname',set_value('firstname',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Vezeték név']); ?>
<?php echo form_error('firstname'); ?>
<br/>
<br/>
<?php echo form_input('lastname',set_value('latstname',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Vezeték név']); ?>
<?php echo form_error('lastname');?>
<br/>
<br/>
<?php echo form_input('city',set_value('city',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Város']);?>
<?php echo form_error('city');?>
<br/>
<br/>
<?php echo form_input('postalcode',set_value('postalcode',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Irányító szám']); ?>
<?php echo form_error('postalcode');?>
<br/>
<br/><?php echo form_input('streetandnumber',set_value('streetandnumber',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Utca házszám']); ?>
<?php echo form_error('streetandnumber');?>
<br/>
<br/><?php echo form_input('phonenumber',set_value('phonenumber',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Telefon szám']); ?>
<?php echo form_error('phonenumber');?>
<br/>
<br/>

<?php echo form_submit('submit','Mentés'); ?>
<br/>

<?php echo form_close(); ?>
<?php endif; ?>