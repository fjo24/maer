@extends('adm.layouts.frame')

@section('titulo', 'Preguntas')

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
        {!!Form::open(['route'=>'preguntas.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Pregunta:')!!}
						{!!Form::text('pregunta', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Respuesta:')!!}
                        {!!Form::text('respuesta', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_pregunta_id', $categoria_preguntas, null, ['class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection
