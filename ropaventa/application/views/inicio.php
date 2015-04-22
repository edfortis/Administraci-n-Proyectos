    
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0;?>
            <?php foreach ($notas as $nota){ ?>
                <li data-target="#myCarousel" data-slide-to="<?=$i?>" ></li>
                <?php $i++;?>
            <?php }?>
        </ol>

        <!-- Wrapper for slides -->
        
        <div class="carousel-inner">
            <?php $i = 1; ?>
            <?php foreach ($notas as $nota) { ?>
            <?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
            <div class="<?php echo $item_class;?>">
                <div class="fill" style="background-image:url('<?php echo base_url()?>img/<?=$nota['url']?>.jpg');"></div>
                <!--<img src="<?php echo base_url()?>img/<?=$nota['url']?>.jpg" >-->
                <div class="carousel-caption">
                    <h2><?=$nota['nombre_producto']?></h2>
                </div>
            </div>
            <?php $i++;?>
            <?php }?> 
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Productos</h2>
            </div>
            <?php foreach ($notas as $nota) { ?>
            <div class="col-md-4 col-sm-6">
                <a href="<?php echo base_url();?>sitio/producto/<?=$nota['idproducto']?>" target="_blank">
                    <img class="img-responsive img-portfolio img-hover" src="<?php echo base_url()?>img/<?=$nota['url']?>_min.jpg" alt="">
                </a>
            </div>
            <?php } ?>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Ropa</h2>
            </div>
            <div class="col-md-6">
                <p>Información de Contacto</p>
                <ul>
                    <li><strong>Bootstrap v3.2.0</strong>
                    </li>
                    <li>jQuery v1.11.0</li>
                    <li>Font Awesome v4.1.0</li>
                    <li>Working PHP contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                    <li>17 HTML pages</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

        <hr>

      