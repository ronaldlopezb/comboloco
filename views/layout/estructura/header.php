<!-- NAVEGADOR -->
<div class="col-xl-5 col-lg-5 subirhead">
    <div class="main-menu  d-none d-lg-block">
        <nav>
            <ul id="navigation">
                <li><a class="active" href="<?=base_url?>">Inicio</a></li>
                <li><a href="<?=base_url?>conocenos/index">Conócenos</a></li>
                <li><a href="<?=base_url?>pedidos/especiales">Pedidos Especiales</a></li>
                <li><a href="<?=base_url?>conocenos/covid">No COVID</a></li>

                <li class="d-md-none"><hr></li>
                <li class="d-md-none"><a href="<?=base_url?>carrito/index">Mi Pedido</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- LOGO -->
<div class="col-xl-2 col-lg-2">
    <div class="logo-img">
        <a href="index.html">
            <img src="<?=base_url?>imagenes/<?= Utils::Config('Logo') ?>" alt="<?= Utils::Config('NombreEmpresa') ?>">
        </a>
    </div>
</div>

<!-- REDES SOCIALES + TELEFONO -->
<div class="col-xl-5 col-lg-5 d-none d-lg-block subirhead">
    <div class="book_room">
        <div class="socail_links">
            <ul>
                <?php $Instagram = Utils::Config('Instagram');  ?>
                <?php if($Instagram != ''): ?>
                    <li>
                    <a href="<?=$Instagram?>" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                <?php endif ?>

                <?php $Facebook = Utils::Config('Facebook');  ?>
                <?php if($Facebook != ''): ?>
                    <li>
                        <a href="<?=$Facebook?>" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                <?php endif ?>

                <?php $Twitter = Utils::Config('Twitter');  ?>
                <?php if($Twitter != ''): ?>
                    <li>
                    <a href="<?=$Twitter?>" target="_blank">
                        <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                <?php endif ?>

                


            </ul>
        </div>
        <div class="book_btn d-none d-xl-block">
            <a href="https://wa.me/51981324352" target="_blank"><?=Utils::Config('Telefono')?></a>
        </div>
    </div>
</div>

<!-- BOTON MENU MOBILE -->
<div class="col-12 subirhead">
    <div class="mobile_menu d-block d-lg-none"></div>
</div>