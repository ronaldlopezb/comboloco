<!-- Cabecera Chica -->
<div class="bradcam_area breadcam_bg_1 overlay">
    <h3>Mi Pedido</h3>
</div>


<div id="datosresultado">
</div>

<?php $_SESSION['TotalGeneral'] = 0; ?>

<!-- Lista de Pedidos - PROGRAMANDO -->
<div class="best_burgers_area">
    <div class="container">
        <?php if (!isset($_SESSION['carrito'])): ?>
            <!-- NO SE INGRESARON PRODCUTOS AL PEDIDO -->
            <div class="container align-items-center">
                
                <!-- Cuadro->Sin productos -->    
                <div class="row ContenedorPrincipalDetalleProducto justify-content-md-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 ">                        
                        <!-- Debe elegir sus prodcutos -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedorimporteproducto">
                            <span>Su pedido está vacio</span>
                            <span>Debe elegir sus productos</span>
                        </div>
                    </div>
        
                </div>

                <!-- Boton: Volver al Catálogo de Productos -->
                <div class="iteam_links">
                    <a class="boxed-btn5 fondoNaranja colorblanco" href="<?=base_url?>">
                        Volver al catálogo de productos
                    </a>
                </div>

            </div> 
        <?php else: ?>

            
            <!-- TITULO -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Configura tu pedido</span>
                        <h3>Elige tus cremas</h3>
                    </div>
                </div>
            </div>

            <!-- BOTON SEGUIR COMPRANDO -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 Derecha">                            
                <a class="BotonSeguirComprando" href="<?=base_url?>">    
                    Seguir Comprando
                </a>
            </div>


            <!-- LISTAR LOS PRODUCTOS INGRESADOS AL PEDIDO -->
            <?php for ($i=0; $i <count($_SESSION['carrito']) ; $i++) : ?>    
            
                <div class="container align-items-center">
                    <div class="row ContenedorPrincipalDetalleProducto justify-content-md-center">
            
                        <!-- Detalle de producto -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 ">
                            <!-- Nombre del Producto + Cantidad -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloproducto">
                                <h3><?=$_SESSION['carrito'][$i]['ProductoNombre']?> x <?=$_SESSION['carrito'][$i]['Cantidad']?></h3>
                            </div>    
                            
                            <!-- Imagen Producto -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedorimagenproducto">
                                <img src="<?=base_url?>imagenes/productos/<?=$_SESSION['carrito'][$i]['Foto']?>" alt="">
                            </div>
                            
                            <!-- SubTotal -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedorimporteproducto">
                                <span><?=Utils::Config('MonedaSigno')?> <?=number_format($_SESSION['carrito'][$i]['SubTotal'],2)?></span>
                                <?php $_SESSION['TotalGeneral'] = $_SESSION['TotalGeneral'] + $_SESSION['carrito'][$i]['SubTotal']; ?>
                            </div>
                        </div>

                        <!-- Cremas -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 ">
                            <!-- Título seleccione cremas-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloelegircremas">
                                <h3>Elija sus cremas</h3>
                
                                <!-- BUCLE DE CREMAS - Seleccionar Creas -->
                                <?php for ($a=0; $a < $_SESSION['carrito'][$i]['Cantidad'] ; $a++) : ?>                                  
                                     
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedorcremas DivCremas">
                                        
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortitulocremas">
                                            <h3>Cremas <?= $a+1 ?></h3>
                                        </div>  
                                        
                                        <?php $Crems = Utils::showCremas(); ?>
                                        <?php while ($crema = $Crems->fetch_object()) : ?>
                                            <?php 
                                                //Armar los ID de los controles Check
                                                $IdChek = $i.'-'.$a.'-'.$crema->Crema;
                                                $chekeo = $_SESSION['carrito'][$i]['Cremas'][$a][$crema->Crema];
                                            ?>

                                            <div class="switch-wrap d-flex justify-content-between juntar">
                                                <p class="colorcremas"><?=$crema->Crema?></p>
                                                <div class="primary-switch">
                                                    <input type="checkbox" id="primary-switch-<?=$IdChek?>" name="<?=$IdChek?>" <?=$chekeo?>>
                                                    <label for="primary-switch-<?=$IdChek?>"></label>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        
                                        <!-- BOTON QUITAR -->
                                        <div class="CuadroQuitarUno">
                                            <a class="BotonQuitarUno" href="<?=base_url?>/carrito/remove&ip=<?=$i?>&ic=<?=$a?>">    
                                                Quitar
                                            </a>
                                        </div>
                                        
                                    </div>
                                <?php endfor ?>
                            </div>
                        </div>
                        


                        <!-- Boton Otro producto igual -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 Derecha">                            
                            <a class="BotonAgregarOtro" href="<?=base_url?>/carrito/add&id=<?=$_SESSION['carrito'][$i]['id_producto']?>">    
                                Agregar otro igual
                            </a>
                        </div>

                    </div>
                    
                </div>
            
            <?php endfor ?>
            


            <!-- Boton Otro producto igual -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 Centrado">                            
                <a class="BotonVaciarCarrito" href="<?=base_url?>/carrito/delete_all">    
                    Vaciar Carrito
                </a>
            </div>

            <!-- Boton Ver Pedido -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="iteam_links">
                        <a class="boxed-btn5 fondoNaranja colorblanco" href="<?=base_url?>carrito/datoscliente">pASO 2: INGRESAR DATOS DE CLIENTE</a>
                    </div>
                </div>
            </div>



        <?php endif ?>

    </div>
</div>
    