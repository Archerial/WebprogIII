<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Ir.szám','cts_postalCode'); ?>
<?php echo form_input('postalCode',set_value('postalCode',$cts->postalCode),['id' => 'cts_postalCode',]); ?>
<?php echo form_error('postalCode');?>
<br/>
<?php echo form_label('Település név','cts_name'); ?>
<?php echo form_input('name',set_value('name',$cts->name)); ?>
<?php echo form_error('name'); ?>
<?php echo form_submit('submit','Küld'); ?>
<?php echo form_close(); ?>