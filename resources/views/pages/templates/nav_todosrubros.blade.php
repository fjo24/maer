<ul class="listado_categorias collapsible" style="    border: none;">
    @foreach($categorias as $cat)  
        <li>
            <a href="{{ route('rubroproductos', $cat->id)}}">
                <div class="categorias_header collapsible-header">
                    {{$cat->nombre}}
                    <i class="flechita material-icons" style="position: absolute;left: 23%;">
                        keyboard_arrow_right
                    </i>
                </div>
            </a>
            <div class="collapsible-body">
                <ul>
                    @foreach($cat->productos as $producto)
                    <li style="margin: 4px 0;">
                        <a href="{{ route('productoinfo', ['id' => $producto->id,'cat' => $cat->id])}}">
                            <span>
                                {{$producto->nombre}}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
        @endforeach
    </li>
</ul>