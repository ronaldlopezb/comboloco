<!-- Cabecera Chica -->
<div class="bradcam_area breadcam_bg_1 overlay">
    <h3>Confirme su Pedido</h3>
</div>

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
                        <span>Revise detenidamente todo su pedido</span>
                    </div>
                </div>
            </div>

            <!-- BOTON VOLVER AL CARRITO -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 Derecha">                            
                <a class="BotonSeguirComprando" href="<?=base_url?>carrito/index">    
                    Volver al Pedido
                </a>
            </div>

            <!-- Datos del Cliente -->
            <div class="container align-items-center">
                <div class="row ContenedorPrincipalDetalleProducto02 justify-content-md-center fondocliente">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloproducto ">
                        <span class="NombreClientePedido"><strong><?=$_SESSION['DatosCliente']['Nombre'] ?></strong></span>
                        <span class="CelularClientePedido"><strong><?=$_SESSION['DatosCliente']['Celular'] ?></strong></span>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloproducto ">
                        <span class="TotalPedidoTexto"><strong>Total del pedido en Soles</strong></span>
                        <br>
                        <span class="TotalPedidoDinero"><strong>S/. <?=number_format($_SESSION['TotalGeneral'],2)?></strong></span>
                        
                    </div>
                </div>
            </div>
            <!-- LISTAR LOS PRODUCTOS INGRESADOS AL PEDIDO -->
            <?php for ($i=0; $i <count($_SESSION['carrito']) ; $i++) : ?>   
                <div class="container align-items-center">
                    <div class="row ContenedorPrincipalDetalleProducto02 justify-content-md-center">
            
                        <!-- Detalle de producto -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 ">
                            
                            <!-- Nombre del Producto + Cantidad + SubTotal -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloproducto">
                                <h4><?=$_SESSION['carrito'][$i]['ProductoNombre']?> x <?=$_SESSION['carrito'][$i]['Cantidad']?></h4>
                                <span class="TextoNaranja SubTotalPedidoDinero"><strong><?=Utils::Config('MonedaSigno')?> <?=number_format($_SESSION['carrito'][$i]['SubTotal'],2)?></strong></span>
                            </div>    
                        </div>

                        <!-- Cremas -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto02 ">
                            <!-- Título seleccione cremas-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortituloelegircremas02">
                
                                <!-- BUCLE DE CREMAS - Seleccionar Creas -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedorcremas DivCremas02">
                                <?php for ($a=0; $a < $_SESSION['carrito'][$i]['Cantidad'] ; $a++) : ?>                                  
                                     
                                    
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedortitulocremas02">
                                            <p class="AlineaIzquierda CremTitulo">
                                                Cremas <?= $a+1 ?>
                                            </p>
                                        </div>  
                                        
                                        <p class="AlineaIzquierda nombrecrema">
                                        <?php $Crems = Utils::showCremas(); ?>
                                        <?php while ($crema = $Crems->fetch_object()) : ?>
                                            <?php 
                                                //Armar los ID de los controles Check
                                                $IdChek = $i.'-'.$a.'-'.$crema->Crema;
                                                $chekeo = $_SESSION['carrito'][$i]['Cremas'][$a][$crema->Crema];
                                                
                                                if ($chekeo == 'checked'){
                                                    echo $crema->Crema;
                                                }
                                         ?>    
                                        <?php endwhile; ?>                                    
                                        </p>
                                <?php endfor ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            <?php endfor ?>

            <!-- Boton Ver Pedido -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="iteam_links">
                        <a class="boxed-btn5 fondoNaranja colorblanco" href="<?=base_url?>carrito/realizarpedido">REALIZAR PEDIDO</a>
                    </div>
                </div>
            </div>



        <?php endif ?>

    </div>
</div>

