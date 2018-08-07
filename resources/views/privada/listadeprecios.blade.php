@extends('privada.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 89%; margin-bottom: 7%; margin-top: 5%;">
    <div class="lista_precios">
        Lista de precios
    </div>
    <div class="center">
        <div class="imagen_catalogo">
                <a href="{{ route('file-pdf2', ['post' => $catalogo->id])}}">
                    <img alt="" src="{{asset('img/catalogo.jpg')}}">
                    </img>
                </a>
            </input>
        </div>
        <div class="descargar_catalogo">
        <a style="color:#595959;" href="{{ route('file-pdf2', ['post' => $catalogo->id])}}">
                    <img alt="" src="{{asset('img/descarga.png')}}">
                    </img>
            Descargar Catalogo
                </a>
        </div>
    </div>
</div>
@endsection
@section('js')
<script class="init" type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function(){
    $("#formpedido").on("change", "input:checkbox", function(){
        $("#formpedido").submit();
    });
});
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection
