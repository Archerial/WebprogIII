<?php if($this->session->userdata('admin')): ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
        <title>Add user from file</title>
    </head>
    <body class="userbground">
    <div class="user2">
    <div class="list">
        <div class="action">
<div class="centermenu">
<?php echo anchor(base_url('products/insert'),'Új hozzáadása'); ?>
    <?php echo anchor(base_url('admin/listofusers/'),'Userek kezelése');?>
    <?php echo anchor(base_url('Fileread'),'Fájl olvasás');?>
    <?php echo anchor(base_url('admin/adminregister/'),'Admin hozzáadása');?>
    <?php echo anchor(base_url('admin/adminlogout/'),'Kilépés');?>
    </div>
    </div>
        <?php
            echo "Ezen oldalon lehetősége van egy user felvételére, úgy, hogy az adatokat elhelyezi, a ". base_url('uploads/txt/text.txt') . ' fájlban. <br>';
            echo "Írja be balról jobbra haladva a fájlba a user email címét, usernevét, jelszavát veszővel elválasztva. <br>"
        ?>
    </div>
     </div>
    </div>

        <div class="critic">
        <?php echo anchor(base_url('fileread/read_from_text/'),'Ide kattinva felviheti a usert, a táblába');?>
        <div>

    </div>
    
    <?php endif;?>


    