<!-- Cabecera Chica -->
<div class="bradcam_area breadcam_bg_1 overlay">
    <h3>Realizar Pedido</h3>
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
                        <span>Ingresar Datos de Cliente</span>
                    </div>
                </div>
            </div>

            <!-- BOTON VOLVER AL CARRITO -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ContenedorDetalleProducto03 Derecha">                            
                <a class="BotonSeguirComprando02" href="<?=base_url?>carrito/index">    
                    Volver al Pedido
                </a>
            </div>
            
            
            <?=Alertas::mostrarAlerta('ErrorDatosCliente','rojo','Check')?>
            <?php Utils::deleteSession('ErrorDatosCliente'); ?>


            <form action="<?=base_url?>carrito/verificarpedido" method="POST">
                <div class="container align-items-center">
                    <div class="row  justify-content-md-center">
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control valid" name="TxtNombreCompleto" type="text" value="<?= Utils::DatoCliente('Nombre') ?>" placeholder="Ingrese su Nombre Completo">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="TxtCelularWhatsapp" type="text" value="<?= Utils::DatoCliente('Celular') ?>" placeholder="# Celular que tenga WhatsApp">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control valid" name="TxtCorreoElectronico"  value="<?= Utils::DatoCliente('Email') ?>" type="email" placeholder="Correo Electrónico (Opcional)">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="TxtMensajeAdicional" cols="30" rows="9" placeholder=" Mensaje Adicional (Opcional)"><?= Utils::DatoCliente('Mensaje') ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>            

                <!-- Boton Ver Pedido -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iteam_links">
                            <input type="submit" class="boxed-btn5 fondoNaranja colorblanco" id ="enviarform" value="Paso 3: CONFIRMAR PEDIDO" />
                        </div>
                    </div>
                </div>

            </form>
        <?php endif ?>

    </div>
</div>
