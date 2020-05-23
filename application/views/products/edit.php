<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<?php $this->load->helper('url'); ?>

<img src="<?php echo base_url()?><?php echo $prod->productPicture?>">
<br/>
<?php echo form_input('productGroup',set_value('productGroup',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Termékcsoportja']); ?>
<?php echo form_error('productGroup'); ?>

<br/>
<?php echo form_input('productName',set_value('productName',''),[ 'id' => 'prod_name',
                                  /*'required' => 'required'*/'placeholder' => 'Termék neve']); ?>
<?php echo form_error('productName');?>
<br/>


<?php echo form_input('productDescription',set_value('productDescription',''), [ /*'required' => 'requried',*/ 
                                  'placeholder' => 'Leírás']); ?>
<?php echo form_error('productDescription'); ?>
<br/>
<?php echo form_input('productPrice',set_value('productPrice',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Ár']); ?>
<?php echo form_error('	productPrice'); ?>
<br/>
<?php echo form_input('productCode',set_value('productCode',''),[ /*'required' => 'required',*/
                                'placeholder' => 'Termékkód']); ?>
<?php echo form_error('	productCode'); ?>

<?php //echo form_input('picturePath',set_value('picturePath','./uploads/img/products/')); ?>
<br/>

<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>