@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5 bg-secondary">

        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">

        </div>
        <!-- Call to Action-->

        <!-- Content Row-->

        <div class="row gx-4 gx-lg-5 m-3 bg-light p-4">

            <form action="{{ route('producto.update',$producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                   <div class="row">
                       <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreProducto" value="{{ $producto->nombre }}">

                       </div>
                       <div class="col">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcionProducto" value="{{ $producto->descripcion }}">
                       </div>
                   </div>
                </div>
                <div class="form-group">
                   <div class="row">
                       <div class="col-1">
                        <img src="/imagen/{{ $producto->imagen }}" width="200px" id="imagenSeleccionada">

                       </div>
                   </div>
                </div>
                <div class="form-group">
                   <div class="row">
                       <div class="col">
                        <label >Subir Imagen</label>
                        <div class="border border-primary mx-auto" >

                            <label >
                                <div >
                                <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="40px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p >Seleccione la imagen</p>
                                </div>
                                <input name="imagen" id="imagen" type='file' class="d-none" />
                            </label>

                        </div>
                       </div>
                   </div>
                </div>
                <div class="form-group">
                    <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
        </div>
        <br>
    </div>
@endsection
<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        $('#imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

