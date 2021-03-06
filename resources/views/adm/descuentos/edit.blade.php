@extends('adm.layouts.frame')

@section('titulo', 'Sistemas de productos')

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
        {!!Form::model($descuento, ['route'=>['descuentos.update',$descuento->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Minimo:')!!}
                        {!!Form::text('minimo', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Maximo:')!!}
                        {!!Form::text('maximo', null , ['class'=>'', ''])!!}
            </div>  
            <div class="input-field col l6 s12">
                {!!Form::label('Porcentaje:')!!}
                        {!!Form::text('porcentaje', null , ['class'=>'', 'required'])!!}
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