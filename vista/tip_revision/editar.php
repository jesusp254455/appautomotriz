<?php
    $rev =   $this->dto["TPREV_TIPO"]; 
    $obs = $this->dto["TPREV_OBS"];
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">tipo de revisiones</h6>
    </div>
</div>
    <div class="card-body">
        <a href="?controlador=trevision&accion=principal" class="btn bg-gradient-primary">inicio</a>   

        <form  autocomplete="off" id="editar" action="?controlador=trevision&accion=editar"  method="POST">
                    <input  type="number" name="id" id="id" class="form-control"
                    value="<?php echo $this->dto["TPREV_ID"]; ?>" style="display:none">
            <div class="input-group input-group-outline mb-3 is-filled">
                <label class="form-label">codigo revision</label>
                    <input  type="number" name="cod" id="cod" class="form-control"
                    value="<?php echo $this->dto["REV_CODIGO"]; ?>">
            </div>
            <div class="input-group input-group-outline mb-3 is-focused">
                <label class="form-label">fecha revision</label>
                    <input  type="date" name="fec_rev" id="fec_rev" class="form-control"
                    value="<?php echo $this->dto["TPREV_FECHA"]; ?>">
            </div>
            <div class="input-group input-group-outline mb-3 is-filled">
                <label class="form-label">tipo de revision</label>
                    <select class="form-control" name="tip_rev" id="tip_red">
                        <option value="">elegir tipo</option>
                        <option <?php echo $rev == "electricidad"?"selected":"" ; ?> value="electricidad">Electricidad externa e interna.</option>
                        <option <?php echo $rev == "alineacion"?"selected":"" ; ?> 
                         value="alineacion">Alineación y balanceo del carro.</option>
                        <option <?php echo $rev == "frenos"?"selected":"" ; ?> 
                         value="frenos">Revisión del sistema de frenos</option>
                        <option <?php echo $rev == "aceite"?"selected":"" ; ?> 
                        value="aceite">Cambio de aceite.</option>
                        <option <?php echo $rev == "tecnico mec"?"selected":"" ; ?> 
                         value="tecnico mec">Revisión técnico mecánica del carro.</option>
                    </select>
            </div>
            <div class="input-group input-group-outline mb-3">
                <textarea name="osb" id="osb" cols="30" rows="10" class="form-control" ><?php echo $obs; ?></textarea>
            </div>
                <input type="submit" name="enviar" value="enviar" class="btn bg-gradient-primary">
        </form>
                </div>
            </div>
        </div>
    </div>
</div>


