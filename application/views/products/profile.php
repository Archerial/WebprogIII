<?php echo form_open(); ?>
<?php echo $prod->name . form_label(' adatlpaja') ; ?>
<br/>
<br/>
<img src="<?php echo base_url()?>uploads/img/products/<?php echo $prod->ssn ?>_001"> 
<br/>
<?php echo form_label('Dolgozó neve:    '); ?>
<?php echo $prod->name ?> <br/>
<?php echo form_label('TAJ száma:   '); ?>
<?php echo  $prod->ssn ?> <br/>
<?php echo form_label('Személyi száma:  '); ?>
<?php echo $prod->tin ?> <br/>
<?php echo form_label('Fájl neve:   '); ?>
<?php echo $prod->ssn .  '_001' ?> <br/>