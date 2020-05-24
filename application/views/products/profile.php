<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Products</title>
</head>
<body class="userbground">
<div class="user">
<?php echo form_open(); ?>
<?php echo $prod->productName .' '. form_label('  terméklapja') ; ?>
<br/>
<img src="<?php echo base_url()?><?php echo $prod->productPicture?>">
<br/>
<?php echo form_label('Termék neve:    '); ?>
<?php echo $prod->productName ?> <br/>
<?php echo form_label('Leírása:   '); ?>
<?php echo  $prod->productDescription ?> <br/>
<?php echo form_label('Ára:  '); ?>
<?php echo $prod->productPrice ?> <br/>