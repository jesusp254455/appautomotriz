<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">revision</h6>
</div>
</div>
<div class="card-body">
<a href="?controlador=revision&accion=principal" class="btn bg-gradient-primary">inicio</a>

<form  autocomplete="off" id="frmregistrar" action="?controlador=revision&accion=frmregistrar"  method="POST">
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">matricula</label>
    <input  type="text" name="mat" id="mat" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">codigo</label>
    <input  type="number" name="cod" id="cod" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3 is-focused">
    <label class="form-label">fecha de revision</label>
    <input  type="date" name="rev_fecha" id="rev_fecha" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3 is-filleds">
    <label class="form-label">observacion</label>
    <textarea name="rev_des" id="rev_des" cols="10" rows="5" class="form-control "></textarea>
    </div>
    <input type="submit" name="enviar" value="enviar" class="btn bg-gradient-primary">
    </form>
</div>
</div>
</div>
</div>
</div>
