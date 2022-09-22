<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">coches</h6>
</div>
</div>
<div class="card-body">
<a href="?controlador=coches&accion=index" class="btn bg-gradient-primary">inicio</a>    

<form  autocomplete="off" id="frmregistrar" action="?controlador=coches&accion=registrar"  method="POST">
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">documento</label>
    <input  type="number" name="documento" id="documento" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">marca</label>
    <input  type="text" name="marca" id="marca" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">color</label>
    <input  type="text" name="color" id="color" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">precio</label>
    <input  type="number" name="precio" id="precio" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">modelo</label>
    <input  type="number" name="modelo" id="modelo" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="form-label">matricula</label>
    <input  type="text" name="matricula" id="matricula" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3 is-focused">
    <label class="form-label">fecha de compra</label>
    <input  type="date" name="fch_compra" id="fch_compra" class="form-control">
    </div>
    <input type="submit" name="enviar" value="enviar" class="btn bg-gradient-primary">
    </form>
</div>
</div>
</div>
</div>
</div>
