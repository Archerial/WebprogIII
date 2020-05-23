<?php if($this->session->userdata('admin')): ?>
    <?php echo anchor(base_url('admin/adminlogout/'),'Kilépés');?>
<?php if($users == NULL || empty($users)): ?>
    <p>Nincs regisztrálva egyetlen user sem</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($users as &$user): ?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->email?></td>
                <td><?php echo anchor(base_url('user/user_profile/'.$user->id), $user->username);?>
                <td><?=md5($user->password)?></td>
                
                <td>
                    <?php echo anchor(base_url('user/delete/'.$user->id),'Törlés');?>
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