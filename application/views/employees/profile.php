<?php echo form_open(); ?>
<?php echo $emp->name . form_label(' adatlpaja') ; ?>
<br/>
<br/>
<img src="<?php echo base_url()?>uploads/img/employees/<?php echo $emp->ssn ?>_001"> 
<br/>
<?php echo form_label('Dolgozó neve:    '); ?>
<?php echo $emp->name ?> <br/>
<?php echo form_label('TAJ száma:   '); ?>
<?php echo  $emp->ssn ?> <br/>
<?php echo form_label('Személyi száma:  '); ?>
<?php echo $emp->tin ?> <br/>
<?php echo form_label('Fájl neve:   '); ?>
<?php echo $emp->ssn .  '_001' ?> <br/>