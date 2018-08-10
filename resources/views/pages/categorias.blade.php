@extends('pages.templates.body')
@section('title', 'Maer - Categorias')
@section('css')
<meta content="{{ $metadato->keywords }}" name="keywords">
    <meta content="{{ $metadato->description }}" name="description">
        <link href="{{ asset('css/page/slider.css') }}" rel="stylesheet">
            <link href="{{ asset('css/pages/categorias.css') }}" rel="stylesheet">
                @endsection
@section('contenido')
                <div class="container" style="width: 92%;">
                    <div class="categorias" style="align-items: center;">
                        <div class="galeriacat center" style="">
                            <div class="row" style="align-items: center">
                                <div class="col l12 s12 m12">
                                    @foreach($categorias as $categoria)
                                    <div class="col l4 s12 m4">
                                        <div class="div-product" style="height: 475px;">
                                            <a href="{{ route('productos', $categoria->id)}}">
                                                <div class="efecto hide-on-med-and-down">
                                                    <span class="central">
                                                        <i class="center material-icons">
                                                            add
                                                        </i>
                                                    </span>
                                                </div>
                                                <img alt="" class="responsive-img" src="{{asset($categoria->imagen)}}" style="">
                                                    <div class="div-nombre">
                                                        {!!$categoria->nombre !!}
                                                    </div>
                                                    <hr>
                                                    </hr>
                                                </img>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

@section('js')

@endsection
            </link>
        </link>
    </meta>
</meta>