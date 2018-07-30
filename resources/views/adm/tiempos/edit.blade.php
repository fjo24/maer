@extends('adm.layouts.frame')

@section('titulo', 'Linea de tiempo')

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
        {!!Form::model($tiempo, ['route'=>['tiempos.update',$tiempo->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Año:')!!}
                        {!!Form::text('ano', null , ['class'=>'', 'required'])!!}
            </div>
            <label class="col l12 s12" for="parrafo">
                Texto
            </label>
            <div class="input-field col s12">
                <textarea class="materialize-textarea" id="parrafo" name="parrafo" required="">
                    {!! $tiempo->parrafo !!}
                </textarea>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
</script>
@endsection