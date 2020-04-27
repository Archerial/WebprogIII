<?php echo validation_errors(); ?>
<?php //echo form_open() ?>
<?php echo form_open_multipart() ?>

<?php echo form_label('Termék neve:','prod_name'); ?> <br/>
<?php echo form_input('productName',set_value('productName',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('productName');?>
<br/>
<?php echo form_input('productGroup',set_value('productGroup',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Termékcsoportja']); ?>
<?php echo form_error('productGroup'); ?>

<br/>

<?php echo form_input('productDescription',set_value('productDescription',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Leírás']); ?>
<?php echo form_error('productDescription'); ?>
<br/>
<?php echo form_input('	productPrice',set_value('	productPrice',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Ár']); ?>
<?php echo form_error('	productPrice'); ?>
<br/>
<?php echo form_input('	productPicture',set_value('	productPicture',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Kép elérése']); ?>
<?php echo form_error('	productPicture'); ?>

<?php //echo form_input('picturePath',set_value('picturePath','./uploads/img/products/')); ?>
<br/>

<?php echo form_upload('file'); ?>

<?php echo form_submit('submit','Mentés'); ?>
<br/>

<?php echo form_close(); ?>

