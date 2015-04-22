<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-6">
                <br />
                <div class="img-portfolio crop" style="margin: 40px 0 0 0;">
                    <img src="<?php echo base_url()?>img/<?=$notas['url']?>.jpg" />
                </div>
            </div>
            <div class="col-md-6">
            <br />
                <div class="products" style="margin:40px 0 0 0;">
                 <p>Precio:</p>
                 <p></p>&dollar;<?php echo $notas['precio']; ?></p>
                <?php echo form_open('cart/add_cart_item'); ?>
                    <fieldset>
                        <label>Cantidad</label>
                        <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                        <?php echo form_hidden('product_id', $notas['idproducto']); ?>
                        <?php echo form_submit('add', 'Agregar'); ?>
                    </fieldset>
                <?php echo form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Carrito</h3>
                    <div id="cart_content">
                        <?php echo $this->view('cart')?>
                    </div>
                </div>
            </div>
        </div>
    </div>

