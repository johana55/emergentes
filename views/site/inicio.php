<?php
include 'views/layout/cliente/head.php';
?>

        <div class="container" id="productos">
            <h2>Ultimo Productos</h2>
            <div class="row" style="margin: auto 5% ">
               <?php
                    foreach ($productos as $producto){
                   $imagenes = $producto->producto()->imagenes();

                   if(!empty($imagenes)){
                       $urlImagen = $imagenes[0]->url;
                   }else
                   {

                       $urlImagen=$config->get('imagenes').'productos/sin-imagen.jpg';
                   }

                   $p=$producto->producto();

                   ?>
                   <div class="col-xs-12 col-sm-6 col-md-3" >

                       <img src="<?= $urlImagen ?>" class="img-rounded img-responsive" alt="<?=$p->nombre ?>"   onclick="onClick(this)" style="margin-bottom: 10px">
                       <a href="<?= $config->get('urlBase').'?controller=Producto&action=detail&id='.$producto->id.'&catalogo='.$catalogo ?>"><h3><?=$p->nombre ?> </h3></a>
                       <p><?=$p->descripcion ?> </p>
                       <h4>Precio: <?=$producto->precio ?> </h4>
                       <?php if(!$cliente->isGuest()){?>
                           <button type="button" class="btn btn-info btn-block" onclick="anadirProducto(<?=$producto->id ?>)">Añadir al Carrito</button>
                       <?php }?>

                   </div>
               <?php } ?>

            </div>
        </div>
                <!-- Paginacion inicio-->
        <div class="w3-center w3-padding-32">
            <ul class="w3-pagination">
                <li><a class="w3-black" href="#">1</a></li>
                <li><a class="w3-hover-black" href="#">2</a></li>
                <li><a class="w3-hover-black" href="#">3</a></li>
                <li><a class="w3-hover-black" href="#">4</a></li>
                <li><a class="w3-hover-black" href="#">»</a></li>
            </ul>
        </div>
            <!-- Fin paginacion -->
    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black w3-padding-20" onclick="this.style.display='none'">

        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <h2 id="caption"></h2>
            <img id="img01" >

        </div>
    </div>

    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }

        function anadirProducto(id) {
            $.ajax(
                {
                    url : '<?= $config->get('urlBase').'?controller=Pedido&action=addProduct'?>',
                    type: "POST",
                    data : {id_producto: id}
                })
                .done(function(data) {
                    //location.reload(true);
                    alert("Producto Agregado al carrito");
                });
            /*
             .fail(function(data) {
             alert( "error" );
             })
             .always(function(data) {
             alert( "complete" );
             })*/ ;
        }
    </script>
<?php
include 'views/layout/cliente/foot.php';
?>