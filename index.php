<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="./estilos.css">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



</head>

<body>
    <div class="containerHeader">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <label>Buscar Cliente </label>
                    <input type="text" placeholder="Buscar Cliente.." class="form-control" id="buscarCliente" value="">

                </div>
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-md-2">
               <button type="button" class="btn btn-info fullWidth" style="margin-top:30px" onclick="showModal('',2)">Nuevo Cliente</button>
                </div>
            </div>

        </div>
    </div>
    <div id="containerPrincipal">



    </div>

    <div class="modal" tabindex="-1" id="primaryModal">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="bodyModal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="guardarModal();">Guardar</button>
                </div>
            </div>
        </div>
    </div>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="./scripts.js"></script>

<script>
    mostrarTablaClientes("");

    var input = document.getElementById("buscarCliente");

    input.addEventListener("keyup", function(event) {

        setTimeout(() => {
            buscarCliente();
        }, 100);

    });
</script>

</html>