<?php echo form_open('user/show_cart'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <title>Kosár</title>
</head>
<div class='pdf1'>
<h1> Az ön által rendelt termékek </h1>

<table cellpadding="6" cellspacing="1" style="width:100%">

<tr>
        <th>Termék név</th>
        <th style="text-align:right">Ára</th>
        <th style="text-align:right">Egység ár</th>
        <th> Mennyiség </th>
</tr>

<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>


                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">HUF <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td> 1 </td>
        </tr>

<?php $i++; ?>
</div>
<?php endforeach; ?>
        <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Összesen</strong></td>
                <td class="right">HUF <?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>

</table>
<p> Köszönjük, hogy nálunk vásárolt! </p>