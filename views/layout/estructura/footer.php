<footer class="footer">
    <div class="footer_top">
        <div class="container">
            
            <!-- Información -->
            <div class="row">

                <!-- LUGAR DE ENTREGA -->
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="footer_widget text-center ">
                        <h3 class="footer_title pos_margin">
                            ¡COMPRAR EN EL COMBO LOCO ES MUY FÁCIL!
                        </h3>
                        <br><br>
                    </div>
                </div>
                
                <!-- PASO 1 -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget text-center ">
                        <h3 class="footer_title pos_margin">
                            Realiza tu Pedido
                        </h3>
                        <p>
                            Selecciona los productos que desees pedir <br> 
                            y especifica las cremas <br>
                        </p>
                        <a class="number">Personaliza cada pedido</a>
                    </div>
                </div>

                <!-- PASO 2 -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget text-center ">
                        <h3 class="footer_title pos_margin">
                            Te llamamos
                        </h3>
                        <p>
                            Para confirmar tu pedido y coordinar entrega <br> 
                            te llamaremos o escribirémos por Whatsapp 
                        </p>
                        <a class="number">Confirmamos tu pedido</a>
                    </div>
                </div>

                <!-- PASO 3 -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget text-center ">
                        <h3 class="footer_title pos_margin">
                            Todo listo!
                        </h3>
                        <p>
                            Te esperaremos en el lugar de entrega, <br> 
                            para que recibas tu pedido
                        </p>
                        <a class="number">Pagas al Recoger</a>
                    </div>
                </div>


                <!-- LUGAR DE ENTREGA -->
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="footer_widget text-center ">
                        <BR>   <BR> 
                        <h3 class="footer_title pos_margin">
                            ¿DONDE DEBO RECOGER MI PEDIDO?
                        </h3>
                        <p><?=Utils::Config('LugarEntrega')?></p>
                        <br>
                        <a class="number">Pagas al Recoger</a>
                        <p><?=Utils::Config('NotaImportante')?></p>
                    </div>
                </div>
            </div>

            <!-- Redes Sociales -->
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="socail_links text-center">
                            <ul>

                                <?php $Instagram = Utils::Config('Instagram');  ?>
                                <?php if($Instagram != ''): ?>
                                    <li>
                                    <a href="<?=$Instagram?>" target="_blank">
                                        <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif ?>

                                <?php $Facebook = Utils::Config('Facebook');  ?>
                                <?php if($Facebook != ''): ?>
                                    <li>
                                        <a href="<?=$Facebook?>" target="_blank">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                <?php endif ?>

                                <?php $Twitter = Utils::Config('Twitter');  ?>
                                <?php if($Twitter != ''): ?>
                                    <li>
                                    <a href="<?=$Twitter?>" target="_blank">
                                        <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                <?php endif ?>
                                
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> 
                        Todos los derechos reservados |  
                        Desarrollado por <a href="http://ronaldlopezb.com" target="_blank">RonaldLopezB</a> 
                        & <a href="http://masterhostperu.com" target="_blank">MasterHostPeru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>