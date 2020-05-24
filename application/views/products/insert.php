<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Add new product</title>
</head>
<body class="userbground">
<?php if($this->session->userdata('admin')): ?>
    
<div class="user">
<?php echo validation_errors(); ?>
<?php echo form_open_multipart() ?>


<?php echo form_input('productGroup',set_value('productGroup',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Termékcsoportja']); ?>
<?php echo form_error('productGroup'); ?>
<br/>
<br/>
<?php echo form_input('productName',set_value('productName',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Termék neve']); ?>
<?php echo form_error('productName');?>
<br/>
<br/>


<?php echo form_input('productDescription',set_value('productDescription',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Leírás']); ?>
<?php echo form_error('productDescription'); ?>
<br/>
<br/>
<?php echo form_input('productPrice',set_value('productPrice',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Ár']); ?>
<?php echo form_error('	productPrice'); ?>
<br/>
<br/>


<?php echo form_input('productCode',set_value('productCode',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Termékkód']); ?>
<?php echo form_error('productCode'); ?>

<?php //echo form_input('picturePath',set_value('picturePath','./uploads/img/products/')); ?>
<br/>
<br/>

<?php echo form_upload('file'); ?>
<br/>
<br/>

<?php echo form_submit('submit','Mentés'); ?>
<br/>

<?php echo form_close(); ?>

<?php endif; ?>