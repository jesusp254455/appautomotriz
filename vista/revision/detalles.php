<?php 
    $placa = $this->datos["CO_MATRICULA"];
    $marca = $this->datos["CO_MARCA"];
    $codigo = $this->datos["REV_CODIGO"];
    $fecha = $this->datos["REV_FECHA"];
    $obs = $this->datos["REV_OBS"];
   
?>
<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">revisiones</h6>
</div>
</div>
<div class="card-body">
    <a href="?controlador=revision&accion=principal" class="btn bg-gradient-primary">inicio</a>
    <br>
<table class="table table-bordered">
        
    <tr>
            <th>placa</th>
            <td><?php echo $placa; ?></td>
    </tr>
    <tr>
            <th>marca</th>
            <td><?php echo $marca; ?></td>
    </tr>
    <tr>
    <th>codigo</th>
            <td><?php echo $codigo; ?></td>
    </tr>
    <tr>
        <th>fecha</th>
            <td><?php echo $fecha; ?></td>
    </tr>
    <th>observacion</th>
            <td><?php echo $obs; ?></td>
    </tr>
   <tr>
        <th>tipo de revision</th>
        <th>observacion</th>
   </tr>
   <?php 
        foreach($this->dato as $v){
                echo "<tr>";
                        echo "<td>".$v["TPREV_TIPO"]."</td>";
                        echo "<td>".$v["TPREV_OBS"]."</td>";
                echo "</tr>";
        }
   ?>
    
</table>
</div>
</div>
</div>
</div>
</div>