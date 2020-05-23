<?php if($this->session->userdata('email')): ?>
    <?php echo anchor(base_url('user/logout/'),'Kilépés');?>
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
                <td><?=$prod->productPrice?></td>
                <td>
                    <?php echo anchor(base_url('products/edit/'.$prod->id),'Kosárba rakom');?>
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