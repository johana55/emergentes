

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
    </form>