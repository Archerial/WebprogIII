<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Ir.szám','prod_postalCode'); ?>
<?php echo form_input('postalCode',set_value('postalCode',$prod->postalCode),['id' => 'prod_postalCode',]); ?>
<?php echo form_error('postalCode');?>
<br/>
<?php echo form_label('Település név','prod_name'); ?>
<?php echo form_input('name',set_value('name',$prod->name)); ?>
<?php echo form_error('name'); ?>
<?php echo form_submit('submit','Küld'); ?>
<?php echo form_close(); ?>