
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Products</title>
</head>
<body class="userbground">
<?php if($this->session->userdata('email')): ?>
<div class="list">
<div class="action">
    <div class="centermenu">
        <?php echo anchor(base_url('user/show_cart'),'Kosaram');?>
    <?php echo anchor(base_url('user/logout/'),'Kilépés');?>
</div>   
</div> 
<div class="lista2"> 
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Neve</th>
                <th>Termékcsoport</th>
                <th>Leírása</th>
                <th>Ár</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?php echo anchor(base_url('products/profile/'.$prod->id), $prod->productName);?>
                <td><?=$prod->productGroup?></td>
                <td><?=$prod->productDescription?></td>
                <td><?=$prod->productPrice?> Ft</td>
                <td>
                    <?php echo anchor(base_url('user/addCart/'.$prod->id),'Kosárba rakom');?>
                    
                </td>
                
            </tr>
            <br>
            <?php endforeach; ?>
        </tbody>    
    </table>
<?php endif; ?>

<?php else: 
    echo 'Először jelentkezzen be';
?>

<?php endif; ?>