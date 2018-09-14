<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <meta content="width=device-width, initial-scale=1" name="viewport"/>
                    <meta content="" name="description"/>
                        <meta content="" name="author"/>
                            <title>
                                :: Maer :: - @yield('titulo')
                            </title>
                 
                            <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"/>
                            <link href="{{ asset('css/privada/layouts/header.css') }}" rel="stylesheet">
                                <link href="{{ asset('css/pages/layouts/footer.css') }}" rel="stylesheet">
                                    @yield('css')
                              <!--     
                               <?php 
header('Access-Control-Allow-Origin: *'); 
?>
                                    <link href="http://allfont.es/allfont.css?fonts=raleway-extrabold" rel="stylesheet" type="text/css" />-->
                                    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
                                    
                                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet"/>
                                            <script src="//code.jquery.com/jquery-1.11.1.min.js">
                                            </script>
                                            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    </head>

        <!-- CABECERA -->
        <header>
            @include('privada.templates.header')
        </header>
        <main>
            @yield('contenido')
        </main>
        @include('pages.templates.footer')

        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        @yield('js')
        <script type="text/javascript">
            $(document).ready(function(){
    $('.sidenav').sidenav();

    $('.collapsible').collapsible();

  });


        </script>
</html>