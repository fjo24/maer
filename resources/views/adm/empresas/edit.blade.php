@extends('adm.layouts.frame')

@section('titulo', 'Editar Quienes Somos')

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
        {!!Form::model($empresa, ['route'=>['empresas.update',$empresa->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Titulo:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Descripcion:')!!}
                        {!!Form::text('descripcion', null , ['class'=>'', ''])!!}
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label class="col l12 s12" for="parrafo">
                    Contenido
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
                        {{$empresa->contenido}}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col l12 s12">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path ']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Primer dato:')!!}
                        {!!Form::text('numero1', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Texto de dato 1:')!!}
                        {!!Form::text('texto1', null , ['class'=>'', ''])!!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Segundo dato:')!!}
                        {!!Form::text('numero2', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Texto de dato 2:')!!}
                        {!!Form::text('texto2', null , ['class'=>'', ''])!!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Tercer dato:')!!}
                        {!!Form::text('numero3', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Texto de dato 3:')!!}
                        {!!Form::text('texto3', null , ['class'=>'', ''])!!}
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
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
<script>
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
