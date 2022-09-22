    $(function(){
      $("#frmregistrar").submit(function(){
        var datos = $(this).serialize();
        var url   = $(this).attr("action");
        $.post(url, datos, function(e){
          Swal.fire(
            e.mensaje,
            '',
            e.icono
          )
            $("#frmregistrar").trigger("reset");
        },'JSON');
          
        return false;
      });

        $("#editar").submit(function(){
          var datos = $(this).serialize();
          var url   = $(this).attr("action");
          $.post(url, datos, function(e){
            
            Swal.fire(
              e.mensaje,
              '',
              e.icono
            )
              $("#editar").trigger("reset");
          },'JSON');
            
          return false;
        });

    

      $("#apellido").keyup(function(){
        var apellido = $(this).val();
        var url = "?controlador=clientes&accion=consultarxape";
        $.post(url, "apellidos="+apellido, function(e){
          if (apellido == "") {
            $("#resultado").html("");
          }else{
            $("#resultado").html(e.mensaje);
          }
          },'json');
      });

      $("#marca").keyup(function(){
        var marcas = $(this).val();
        var url = "?controlador=coches&accion=consultarmarca";
        $.post(url, "marca="+marcas, function(e){
          if (marcas == "") {
            $("#resultado").html("");
          } else {
            $("#resultado").html(e.mensaje);
          }
        },'json');
    });

    $("#placa").keyup(function(){
      var placas = $(this).val();
      var url = "?controlador=revision&accion=consultarplaca";
      $.post(url, "placa="+placas, function(e){
        if (placas == "") {
          $("#resultado").html("");
        } else {
          $("#resultado").html(e.mensaje);
        }
      },'json');
  });

      $("#codigo").keyup(function(){
        var cod = $(this).val();
        var url = "?controlador=trevision&accion=consultarxcod";
        $.post(url, "codigo="+cod, function(e) {
          if (cod == "") {
            $("#resultado").html("");
          } else {
            $("#resultado").html(e.mensaje);
          }
        },'json');
      });

      $(document).on('click', '.eliminar', function(e){
        var url = $(this).attr("href");
        var elemento = $(this);
        Swal.fire({
          title: 'comfirmar eliminacion',
          text: "se eliminara el cliente de la base de datos",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: 'red',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'eliminar',
          cancelButtonText: 'cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.get(url, '', function(e){
              elemento.closest("tr").remove();
              Swal.fire(
                e.mensaje,
                '',
                e.icono
              )
            },'json');
          }
        })
        return false;
        
      })

      $("#login").submit(function(){
        var datos = $(this).serialize();
        var url   = $(this).attr("action");
        $.post(url, datos, function(e){
            if (e.icono == "error") {
              Swal.fire(
                e.mensaje,
                '',
                e.icono,
              )
            } else {
              window.location.href = e.URL;
            }
        },'json');
          
        return false;
      });

    })