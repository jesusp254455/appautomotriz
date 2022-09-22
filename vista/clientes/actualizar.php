<?php 
            $var =   $this->dato["CLI_ROL"]; 
        ?>
<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">clientes</h6>
</div>
</div>
<div class="card-body">
<a href="?controlador=clientes&accion=principal" class="btn bg-gradient-primary">inicio</a>

<form  autocomplete="off" id="editar" action="?controlador=clientes&accion=editar"  method="POST">
    <div class="input-group input-group-outline mb-3 is-filled">
    <label class="form-label">documento</label>
    <input  type="number" name="documento" id="documento" class="form-control" value="<?php echo $this->dato["CLI_DOCUMENTO"]; ?>">
    </div>
    <input style="display:none" type="number" name="id" id="id" class="form-control" value="<?php echo $this->dato["CLI_ID"]; ?>">

    <div class="input-group input-group-outline mb-3 is-filled">
    <label class="form-label">nombres</label>
    <input  type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $this->dato["CLI_NOMBRES"]; ?>">
    </div>
    <div class="input-group input-group-outline mb-3 is-filled">
    <label class="form-label">apellidos</label>
    <input  type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $this->dato["CLI_APELLIDOS"]; ?>">
    </div>
    <div class="input-group input-group-outline mb-3 is-filled ">
    <label class="form-label">codigo</label>
    <input  type="number" name="codigo" id="codigo" class="form-control" value="<?php echo $this->dato["CLI_CODIGO"]; ?>">
    </div>
    <select class="form-control" name="rol" id="rol" >
        <option <?php echo $var == "administrador"?"selected":"" ; ?> value="administrador"> administrador</option>
        <option <?php echo $var == "mecanico"?"selected":"" ; ?> value="mecanico">mecanico</option>
        <option <?php echo $var == "cliente"?"selected":"" ; ?>  value="cliente">cliente</option>
        <option <?php echo $var == "secretaria"?"selected":"" ; ?>  value="secretaria">secretaria</option>
    </select>
    <input type="submit" name="enviar" value="actualizar" class="btn bg-gradient-primary">

    </form>
</div>
</div>
</div>
</div>
</div>
