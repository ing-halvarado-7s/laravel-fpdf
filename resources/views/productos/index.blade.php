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
                    <a href="{{ route('producto.create') }}" class="btn btn-primary">Crear</a>
                </div>
            </div>

            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td >{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td><img src="/imagen/{{ $producto->imagen }}" alt="imagen-producto" width="30%"></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('producto.edit',$producto->id) }}">Editar</a>
                                <form action="{{ route('producto.destroy',$producto->id) }}" method="POST" class="formEliminar" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {!! $productos->links() !!}
            </div>


        </div>
    </div>
@endsection

<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
          event.preventDefault()
          event.stopPropagation()
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })
      }, false)
    })
})()
</script>
