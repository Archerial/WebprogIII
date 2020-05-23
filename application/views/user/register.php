<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?>
<?php endif; ?>
<?php echo form_open(); ?>
<br/>
<?php echo form_label('Email cím:','userEmail'); ?> <br/>
<?php echo form_input('userEmail',set_value('userEmail',''),[ 'id' => 'userEmail',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('userEmail');?>
<br/>
<br/>

<?php echo form_label('Felhasználó név:','userName'); ?> <br/>
<?php echo form_input('userName',set_value('userName',''), [ /*'required' => 'requried',*/ 
                                  ]); ?>
<?php echo form_error('userName'); ?>
<br/>
<br/>
<?php echo form_label('Jelszó:','userPassword'); ?> <br/>
<?php echo form_password('userPassword',set_value('userPassword',''),[]); ?>
<?php echo form_error('userPassword'); ?>
<br/>
<br/>


<?php echo form_submit('submit','Regisztáció'); ?>
<br/>
<p>Már regisztráltál? <?php echo anchor(base_url('user/login/'),'Lépj be itt');?></p>

<?php echo form_close(); ?>