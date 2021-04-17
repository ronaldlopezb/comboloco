<div class="best_burgers_area">
    <div class="container">
        <!-- TITULO -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span>Las más ricas Hamburguesas</span>
                    <h3>Ahora en Promoción</h3>
                </div>
            </div>
        </div>

        <!-- Productos en Promoción -->
        <div class="row">
            <?php $productos = Utils::showProductos('001'); ?>
            <?php while ($producto = $productos->fetch_object()) : ?>

                <div class="col-xl-6 col-md-6 col-lg-6 sep20">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="<?=base_url?>imagenes/productos/<?=$producto->Foto?>" alt="<?=$producto->Producto?>">
                        </div>
                        <div class="info">
                            <h3><?=$producto->Producto?></h3>
                            <p><?=$producto->Descripcion?></p>
                            <span><?=Utils::Config('MonedaSigno')?> <?=$producto->Precio?></span>
                            <a href="<?=base_url?>carrito/add&id=<?=$producto->IdProducto?>" class="boxed-btn3">Pedir ahora</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>

        <!-- Nuestra Carta -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <h3>Nuestra Carta</h3>
                </div>
            </div>
            
            <?php $productos = Utils::showProductos(''); ?>
            <?php while ($producto = $productos->fetch_object()) : ?>

                <div class="col-xl-6 col-md-6 col-lg-6 sep20">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="<?=base_url?>imagenes/productos/<?=$producto->Foto?>" alt="<?=$producto->Producto?>">
                        </div>
                        <div class="info">
                            <h3><?=$producto->Producto?></h3>
                            <p><?=$producto->Descripcion?></p>
                            <span><?=Utils::Config('MonedaSigno')?> <?=$producto->Precio?></span>
                            <a href="<?=base_url?>carrito/add&id=<?=$producto->IdProducto?>" class="boxed-btn3">Pedir ahora</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
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