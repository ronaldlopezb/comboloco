<!-- Cabecera Chica -->
<div class="bradcam_area breadcam_bg_1 overlay">
    <h3>Carrito</h3>
</div>



<!-- Lista de Pedidos -->
<div class="best_burgers_area">
    <div class="container">
        <!-- TITULO -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span>Configura tu pedido</span>
                    <h3>Elige tus cremas</h3>
                </div>
            </div>
        </div>




<!-- Listar Productos -->




<div class="container single_delicious d-flex align-items-center">
  <div class="row">
    <div class="col-4">
      One of three columns
    </div>
    <div class="col-4">
      One of three columns
    </div>
    <div class="col-4">
      One of three columns
    </div>
  </div>


  ---------------------------------


<div class="row">
    <div class="col-lg-12">
        <?php $productos = Utils::showProductos(); ?>
        <?php while ($producto = $productos->fetch_object()) : ?>

            <div class="col-xl-12 col-md-12 col-lg-12 sep20">
                <div class="single_delicious d-flex align-items-center">
                    <div class="thumb">
                        <img src="<?=base_url?>imagenes/productos/<?=$producto->Foto?>" alt="<?=$producto->Producto?>">
                    </div>
                    <div class="info">
                        <h3><?=$producto->Producto?> x 2</h3>
                        <span><?=Utils::Config('MonedaSigno')?> <?=$producto->Precio?></span>
                    </div>
                    <div class="">
                        <p>Elegir Cremas</p>
                        <?php $Crems = Utils::showCremas(); ?>
                        <?php while ($crema = $Crems->fetch_object()) : ?>
                            
                            <div class="switch-wrap d-flex justify-content-between sinbooton">
                                <p><?=$crema->Crema?></p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="primary-switch-<?=$crema->IdCrema?>" name="<?=$crema->Crema?>">
                                    <label for="primary-switch-<?=$crema->IdCrema?>"></label>
                                </div>
                            </div>
                    

                        


                        <?php endwhile; ?>

                        
                    </div>
                </div>
            </div>

        <?php endwhile; ?>


    </div>
</div>










---------------------------------------











        <!-- Listar Productos -->
        <div class="row">
            <div class="col-lg-12">
                <?php $productos = Utils::showProductos(); ?>
                <?php while ($producto = $productos->fetch_object()) : ?>

                    <div class="col-xl-12 col-md-12 col-lg-12 sep20">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="<?=base_url?>imagenes/productos/<?=$producto->Foto?>" alt="<?=$producto->Producto?>">
                            </div>
                            <div class="info">
                                <h3><?=$producto->Producto?> x 2</h3>
                                <span><?=Utils::Config('MonedaSigno')?> <?=$producto->Precio?></span>
                            </div>
                            <div class="">
                                <p>Elegir Cremas</p>
                                <?php $Crems = Utils::showCremas(); ?>
                                <?php while ($crema = $Crems->fetch_object()) : ?>
                                    
                                    <div class="switch-wrap d-flex justify-content-between sinbooton">
								        <p><?=$crema->Crema?></p>
								        <div class="primary-switch">
									        <input type="checkbox" id="primary-switch-<?=$crema->IdCrema?>" name="<?=$crema->Crema?>">
									        <label for="primary-switch-<?=$crema->IdCrema?>"></label>
								        </div>
                                    </div>
                            

                                


                                <?php endwhile; ?>

                                
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>


            </div>
        </div>

        <!-- Boton Ver Pedido -->
        <div class="row">
            <div class="col-lg-12">
                <div class="iteam_links">
                    <a class="boxed-btn5 fondoNaranja colorblanco" href="<?=base_url?>carrito/index">Ver mi Pedido</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>