<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>User</title>
</head>
<body class="userbground">
<div class="user">
<?php echo form_open(); ?>
<?php echo $user->username . form_label(' adatlapja') ; ?>
<br/>
<?php echo form_label('Felhasználó neve:    '); ?>
<?php echo $user->username ?> <br/>
<?php echo form_label('E-mail címe:   '); ?>
<?php echo  $user->email ?> <br/>
<?php echo form_label('Jelszava:  '); ?>
<?php echo md5($user->password) ?> <br/>