<?php 
    $d = $this->dta["CLI_DOCUMENTO"];
    $cl = $this->dta["CLI_NOMBRES"];
    $m = $this->dta["CO_MARCA"];
    $c = $this->dta["CO_COLOR"];
    $pre = $this->dta["CO_PRECIO"];
    $pr = $this->dta["CO_MODELO"];
    $p = $this->dta["CO_MATRICULA"];
    $f = $this->dta["CO_FECHA_COMPRA"];

?>

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
    <br>
    <table class="table table-bordered">
        <tr>
            <th class="text-dark">documento del cliente</th>
            <th class="text-dark">nombre del cliente</th>
            <th class="text-dark">marca</th>
            <th class="text-dark">color</th>
        </tr>
        <tr>
            <td><?php echo $d; ?></td>
            <td><?php echo $cl; ?></td>
            <td><?php echo $m; ?></td>
            <td><?php echo $c; ?></td>
            
        </tr>
        <tr>
            <th class="text-dark">precio</th>
            <th class="text-dark">placa</th>
            <th class="text-dark">fecha de compra</th> 
        </tr>
        <tr>
            <td><?php echo $pre; ?></td>
            <td><?php echo $p; ?></td>
            <td><?php echo $f; ?></td>
        </tr>
    </table>
    
</div>
</div>
</div>
</div>
</div>