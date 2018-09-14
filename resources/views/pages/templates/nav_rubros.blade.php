<ul class="listado_categorias collapsible" style="    border: none;">
    @foreach($categorias as $cat)  
                            @if($categoria->id==$cat->id)
    <li class="active">
        @else
        <li>
            @endif
            <a href="{{ route('rubroproductos', $cat->id)}}">
                                            @if($categoria->id==$cat->id)
                <div class="activo categorias_header collapsible-header">
                    {{$cat->nombre}}          
                    <i class="flechita material-icons" style="color:black!important; position: absolute;left: 23%;">
                        keyboard_arrow_down
                    </i>
                    @else
                    <div class="categorias_header collapsible-header">
                    {{$cat->nombre}}
                    <i class="flechita material-icons" style="position: absolute;left: 23%;">
                        keyboard_arrow_right
                    </i>
                    @endif
                </div>
            </a>
            <div class="collapsible-body">
                <ul>
                            @foreach($productos as $producto)
                    @foreach($categoria->productos as $pro)
                            @if($pro->id==$producto->id)
                    <li style="margin: 4px 0;">
                        <a href="{{ route('productoinfo', ['id' => $producto->id,'cat' => $categoria->id])}}">
                            <span>
                                {{$pro->nombre}}
                            </span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
            </div>
        </li>
        @endforeach
    </li>
</ul>