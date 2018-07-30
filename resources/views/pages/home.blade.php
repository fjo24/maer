@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 561,
    });
</script>
@endsection
