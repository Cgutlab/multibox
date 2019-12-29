@extends('layouts.front')

@section('title','Solicitud de presupuesto')
 
@section('main')
        <section class="portada" style="background-image: url('{{ asset('img/iconos/'.$icono->imagen) }}');">
            <div class="capa"></div>
            <div class="container">
                <h4>{{$icono->texto}}</h4>
            </div>
        </section>
        <main>
            <div class="container solicitud">
                <div class="row iconos">
                    <div class="horizontal"></div>
                    <div class="col s6 lado" id="datos">
                        <img src="img/cuaderno-nota.png">
                        <div class="vertical"></div>
                        <div class="circulo"></div>
                        <label class="color">SUS DATOS</label>
                    </div>
                    <div class="col s6 lado gris" id="presupuesto">
                        <img src="img/cuadro-dialogo.png">
                        <div class="vertical"></div>
                        <div class="circulo"></div>
                        <label class="color">SU CONSULTA</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m10 offset-m1">
                        <form action="" method="POST">
                            <div class="row" id="estado1">
                                <div class="col s6 input-field">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="validate" required>
                                </div>
                                <div class="col s6 input-field">
                                    <label for="localidad">Localidad</label>
                                    <input type="text" name="localidad" class="validate" required>
                                </div>
                                <div class="col s6 input-field">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" class="validate" required>
                                </div>
                                <div class="col s6 input-field">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="validate" required>
                                </div>
                                <div class="col s12">
                                    <button type="button" class="btn right" id="siguiente">SIGUIENTE</button>
                                </div>
                            </div>
                            <div class="row" id="estado2" style="display: none;">
                                <div class="col s6 input-field">
                                    <label for="mensaje">Mensaje</label>
                                    <textarea name="mensaje" class="materialize-textarea"></textarea>
                                </div>
                                <div class="col s6 input-field file-field">
                                    <div class="btn">
                                        <span>Examinar</span>
                                        <input type="file" name="archivo">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input type="text" class="file-path validate" name="">
                                    </div>
                                </div>
                                <div class="col s6 offset-s6">
                                    <button type="button" class="btn-invertido btn left" id="atras">ATRAS</button>
                                    <button type="button" class="btn right">ENVIAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </main>
        <script>
            $('#siguiente').click(function(event) {
                var nombre = $('input[name=nombre]').val();
                var localidad = $('input[name=localidad]').val();
                var email = $('input[name=email]').val();
                var telefono = $('input[name=telefono]').val();
                if (nombre!='' && localidad!='' && email!='' && telefono!='')
                {
                    adelante();
                }
            });

            $('#atras').click(function(event) {
                atras();
            });

            function adelante()
            {
                document.getElementById("estado1").className = "animated bounceOutLeft";
                setTimeout(function(){ 
                    $("#estado1").hide('fast', function() {});
                    $("#estado2").show('fast', function() {});
                    document.getElementById("estado2").className = "animated bounceInRight";
                }, 1000);
                $('#presupuesto').removeClass('gris');
                $('#datos').addClass('gris');
            };

            function atras()
            {
                document.getElementById("estado2").className = "animated bounceOutLeft";
                
                setTimeout(function(){ 
                    $("#estado2").hide('fast', function() {}); 
                    $("#estado1").show('fast', function() {});
                    document.getElementById("estado1").className = "animated bounceInRight";
                }, 1000);
                
                $('#datos').removeClass('gris');
                $('#presupuesto').addClass('gris');
            };

            function animacion(id, clase) {
                $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                  $(this).removeClass("animated "+clase);
                });
            };
            $(document).ready(function() {
                $('select').material_select();
            });
        </script>
@endsection