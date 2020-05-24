<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Köszönjük a vásárlást</title>
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
<div class='summtitle'>
Köszönjük a vásárlását:)
<?php endif;?>