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
            <?php foreach($cities as &$cts): ?>
            <tr>
                <td><?=$cts->id?></td>
                <td><?=$cts->postalCode?></td>
                <td><?=$cts->name?></td>
                <td>
                    <?php echo anchor(base_url('cities/edit/'.$cts->id),'Módosítás');?>
                    <?php echo anchor(base_url('cities/delete/'.$cts->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>