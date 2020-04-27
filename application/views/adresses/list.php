<?php echo anchor(base_url('cities/insert'),'Új hozzáadása'); ?>
<?php if($cities == NULL || empty($cities)): ?>
    <p>Nincs település rögzítve!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Postal code</th>
                <th>Name</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($cities as &$prod): ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><?=$prod->postalCode?></td>
                <td><?=$prod->name?></td>
                <td>
                    <?php echo anchor(base_url('cities/edit/'.$prod->id),'Módosítás');?>
                    <?php echo anchor(base_url('cities/delete/'.$prod->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>