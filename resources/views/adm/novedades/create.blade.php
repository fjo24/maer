@extends('adm.layouts.frame')

@section('titulo', 'Nueva novedad')

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
    <div class="col l12 s12">
        {!!Form::open(['route'=>'novedades.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Fecha:')!!}
                        {!!Form::text('fecha', null , ['class'=>'datepicker', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_novedad_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen para galeria
                    </span>
                    {!! Form::file('imagen1') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen1',null, ['class'=>'file-path']) !!}
                    {!!Form::label('')!!}
                </div>
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen en info del producto
                    </span>
                    {!! Form::file('imagen2') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen2',null, ['class'=>'file-path']) !!}
                    {!!Form::label('')!!}
                </div>
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('producto_id', $productos, null, ['class' => 'form-control', 'placeholder' => 'Producto involucrado', 'required']) !!}
            </div>
        </div>
        <label class="col l12 s12" for="contenido">
            Contenido
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
            </textarea>
        </div>
        <label class="col l12 s12" for="descripcion">
            Linea final
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
   $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
              selectYears: 200
        });
   });

    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
