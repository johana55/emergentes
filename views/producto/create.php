

<form class="form-horizontal" action="<?= $config->get('urlBase').'?controller=Producto&action=store'?>" method="post">

        <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="Titulo del Producto">
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Describe el Producto">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Registrar</button>
            </div>
        </div>
    	Unidad de Medida	Marca	Categoria
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Precio Compra</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="precio_compra" placeholder="Ingresa el precio">
        </div>
    </div>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Unidad de Medida
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>

        </ul>
        <select name="umedida" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">


        </select>
    </div>
    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Precio Compra</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="precio_compra" placeholder="Ingresa el precio">
        </div>
    </div>
    </form>