@extends('adm.layouts.frame')

@section('titulo', 'Aplicaciones')

@section('contenido')
	    @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
		@if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <td>
                    Imagen
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    Orden
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach($aplicaciones as $aplicacion)
                <tr>    
                    <td>
                        <img alt="" class="imagen_listado" height="60%" src="{{ asset($aplicacion->imagen) }}" width="72%"/>
                    </td>
                    <td>
                        {!!$aplicacion->nombre!!}
                    </td>
                    <td>
                        {!!$aplicacion->orden!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('aplicaciones.edit',$aplicacion->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['aplicaciones.destroy', $aplicacion->id], 'method' => 'DELETE'])!!}
                                    <button onclick="return confirm('¿Realmente deseas borrar la aplicacion?')" type="submit" class="submit-button">
                                        <i class="material-icons red-text">cancel</i>
                                    </button>
                                {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a href="{{ route('aplicaciones.create') }}">
            <div class="col l12 s12 no-padding" href="">
                <button class="boton btn-large right" name="action" type="submit">
                    Nuevo
                </button>
            </div>
        </a>
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
