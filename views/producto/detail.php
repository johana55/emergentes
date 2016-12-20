<?php
include 'views/layout/cliente/head.php';
?>

    <div class="container" id="producto" style="margin-bottom: 20px">
        <h2>Datelle</h2>
        <h3 class="text-center"><?=$productoc->producto()->nombre ?></h3>

        <div class="row" style="margin: auto 5% ">
            <?php foreach ($productoc->producto()->imagenes() as $imagen){ ?>
                <div class="col-md-4" >
                    <img src="<?= $imagen->url?>" class="img-rounded img-responsive" alt="<?=$productoc->producto()->nombre ?>"   onclick="onClick(this)" style="margin-bottom: 10px">
                </div>
            <?php }?>

        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <ul class="list-group-item ">
                   <li class="list-group-item"><h4 style="display: inline" >Codigo Producto: </h4>   <?= $productoc->producto()->id ?> </li>
                   <li class="list-group-item"><h4 style="display: inline">Precio: </h4> <?= $productoc->precio ?></li>
                   <li class="list-group-item"><h4 style="display: inline">Nombre Producto: </h4> <?= $productoc->producto()->nombre ?> </li>
                   <li class="list-group-item"><h4 style="display: inline">Descripcion: </h4> <?= $productoc->producto()->descripcion ?></li>
                   <li class="list-group-item"><h4 style="display: inline">Unidad Medida: </h4> <?= $productoc->producto()->unidad_medida()->descripcion ?></li>
                   <li class="list-group-item"><h4 style="display: inline">Marca: </h4> <?= $productoc->producto()->marca()->descripcion ?></li>
                   <li class="list-group-item"><h4 style="display: inline">Categoria: </h4> <?= $productoc->producto()->categoria()->descripcion ?></li>
                   <li class="list-group-item"><h4 style="display: inline">Stock: </h4> <?= $productoc->stock ?></li>

               </ul>
                <?php if(!$cliente->isGuest()){?>
                <button type="button" class="btn btn-info btn-block" onclick="anadirProducto(<?=$productoc->id ?>)">Añadir al Carrito</button>
                <?php } ?>

            </div>

        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" id="pop">

            </div>
        </div>
    </div>




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