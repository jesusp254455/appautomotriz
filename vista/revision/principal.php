<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">Revision</h6>
</div>
</div>
<div class="card-body">
    <?php if($_SESSION["rol"] == "mecanico" || $_SESSION["rol"] == "administra" ){?>
    <a href="?controlador=revision&accion=registrar" class="btn bg-gradient-primary">registrar</a>
    <?php } ?>
    <br>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">placa</label>
    <input autocomplete="off" type="text" name="placa" id="placa" class="form-control">
    </div>
</div>
<div id="resultado">

</div>
</div>
</div>
</div>
</div>
</div>