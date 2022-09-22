<?php 

$var =  $this->datos["REV_OBS"]; 
?>

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

        <form  autocomplete="off" id="editar" action="?controlador=revision&accion=editar"  method="POST">
        <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                    <input  type="number" name="id" id="id" class="form-control" style="display:none" value="<?php echo $this->datos["REV_ID"]; ?>">
            </div>
        <div class="input-group input-group-outline mb-3 is-filled">
                <label class="form-label">placa</label> 
                    <input  type="text" name="mat" id="mat" class="form-control" value="<?php echo $this->datos["CO_MATRICULA"]; ?>">
            </div>   
            <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                    <input  type="number" name="codigo" id="codigo" class="form-control" value="<?php echo $this->datos["REV_CODIGO"]; ?>">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                    <input  type="date" name="rev_fecha" id="rev_fecha" class="form-control"  value="<?php echo $this->datos["REV_FECHA"]; ?>" >
            </div>
            <div class="input-group input-group-outline mb-3">
                    <textarea name="rev_des" id="rev_des" cols="10" rows="5" class="form-control"><?php echo $var; ?></textarea>
            </div>
            <input type="submit" name="enviar" value="actualizar" class="btn bg-gradient-primary">
        </form>
</div>
</div>
</div>
</div>
</div>
