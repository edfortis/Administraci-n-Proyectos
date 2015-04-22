 <br />
                <div style="margin:40px 0 0 0;">
                    <?php if(!$this->cart->contents()):
    echo 'Tu carrito se encuentra vacio.';
else:
?>
 
<?php echo form_open('cart/update_cart'); ?>
<table width="100%" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Cantidad</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Sub-Total</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($this->cart->contents() as $items): ?>
         
        <?php echo form_hidden('rowid[]', $items['rowid']); ?>
        <tr <?php if($i&1){ echo 'class="alt"'; }?>>
            <td>
                <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
            </td>
             
            <td><?php echo $items['name']; ?></td>
             
            <td>&dollar;<?php echo $this->cart->format_number($items['price']); ?></td>
            <td>&dollar;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>
         
        <?php $i++; ?>
        <?php endforeach; ?>
         
        <tr>
            <td</td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>&dollar;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>
    </tbody>
</table>
 
<p><?php echo form_submit('', 'Actualiza carrito'); echo anchor('', 'Vaciar carrito', 'class="empty"');?></p>
<p><small>Si la cantidad es 0 el articulo se elmina del carrito</small></p>
<?php 
echo form_close(); 
endif;
?>
                </div>