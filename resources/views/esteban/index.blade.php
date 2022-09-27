@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5 bg-secondary">

        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">

        </div>
        <!-- Call to Action-->

        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="row">
                <div class="col">

                    <form action="{{ route('imagenes.enviardatos')}}" method="post">
                        @csrf
                        <input type="text" id="posicion" name="posicion" class="d-none">
                        <button onclick="alerta()" id="btn1">Imprimir</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>

        </div>
    </div>
@endsection

<script>
   function alerta()
{
var mensaje;
var opcion = prompt("Ingrese la posición de la etiqueta:");
//document.writeln(opcion);

if (opcion == null || opcion == "") {
        mensaje = "Has cancelado o introducido el nombre vacío";
        } else {
            mensaje = opcion;
            }
            document.getElementById("posicion").value = mensaje;
}
</script>
