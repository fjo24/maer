@extends('adm.layouts.frame')

@section('titulo', 'Listado de Novedades')

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
                <th>
                    Nombre
                </th>
                <th>
                    Sección
                </th>
                <th>
                	Orden
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($novedades as $novedad)
                <tr>
                    <td>
                        {!!$novedad->nombre!!}
                    </td>
                    <td>
                        {!!$novedad->categoria_novedad->nombre!!}
                    </td>
                    <td>
                    	{!!$novedad->orden!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('novedades.edit',$novedad->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['novedades.destroy', $novedad->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm_delete(this);" type="submit">
                            <i class="material-icons red-text">
                                cancel
                            </i>
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
