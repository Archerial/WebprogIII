<?php if($this->session->userdata('admin')): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Products</title>
</head>
<body class="userbground">
<div class="list">
    <div class="action">
    <div class="centermenu">
    <?php echo anchor(base_url('products/insert'),'Új hozzáadása'); ?>
    <?php echo anchor(base_url('admin/listofusers/'),'Userek kezelése');?>
    <?php echo anchor(base_url('admin/adminregister/'),'Admin hozzáadása');?>
    <?php echo anchor(base_url('admin/adminlogout/'),'Kilépés');?>
    </div>
</div><?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <div class="lista2">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Termékcsoport</th>
                <th>Neve</th>
                <th>Leírása</th>
                <th>Ár</th>
                <th>Termékkód</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><?=$prod->productGroup?></td>
                <td><?php echo anchor(base_url('products/profile/'.$prod->id), $prod->productName);?>
                <td><?=$prod->productDescription?></td>
                <td><?=$prod->productPrice?></td>
                <td><?=$prod->productCode?></td>
                
                <td>
                    <?php echo anchor(base_url('products/edit/'.$prod->id),'Módosítás');?>
                    <?php echo anchor(base_url('products/delete/'.$prod->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
    </div>
<?php endif; ?>

<?php else: 
    echo 'Először jelentkezzen be';
?>

<?php endif; ?>