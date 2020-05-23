<?php if($this->session->userdata('admin')): ?>
    <?php echo anchor(base_url('products/insert'),'Új hozzáadása'); ?>
    <?php echo anchor(base_url('admin/adminlogout/'),'Kilépés');?>
    <?php echo anchor(base_url('admin/listofusers/'),'Userek kezelése');?>
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
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
                    <?php echo anchor(base_url('products/profile/'.$prod->id),'Profil');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
<?php endif; ?>

<?php else: 
    echo 'Először jelentkezzen be';
?>

<?php endif; ?>