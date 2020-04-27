<?php echo validation_errors(); ?>
<?php //echo form_open() ?>
<?php echo form_open() ?>

<?php echo form_label('Dolgozó neve:','emp_name'); ?> <br/>
<?php echo form_input('name',set_value('name',''),[ 'id' => 'emp_name',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('name');?>
<br/>
<?php echo form_input('tin',set_value('tin',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Adóazonosító']); ?>
<?php echo form_error('tin'); ?>
<br/>
<?php echo form_input('ssn',set_value('ssn',''),[ /*'required' => 'required',*/
                                'placeholder' => 'TAJ']); ?>
<?php echo form_error('ssn'); ?>

<?php //echo form_input('picturePath',set_value('picturePath','./uploads/img/employees/')); ?>
<br/>

<?php echo form_submit('submit','Mentés'); ?>
<br/>

<?php echo form_close(); ?>

