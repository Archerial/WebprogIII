<?php echo form_open(); ?>
<?php echo $prod->id . form_label(' terméklapja') ; ?>
<br/>
<br/>
<img src="<?php echo base_url()?>uploads/img/products/<?php echo $prod->id ?>> 
<br/>
<?php echo form_label('Termék neve:    '); ?>
<?php echo $prod->productName ?> <br/>
<?php echo form_label('Leírása:   '); ?>
<?php echo  $prod->productDescription ?> <br/>
<?php echo form_label('Ára:  '); ?>
<?php echo $prod->productPrice ?> <br/>