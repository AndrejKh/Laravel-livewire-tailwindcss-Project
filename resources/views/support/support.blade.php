@extends('layouts.app')

    @section('title')
        Soporte y Ayuda - Kabasto.com
    @endsection

    @section('header')
        <!-- Primary Meta Tags -->
        <meta name="title" content="Kabasto.com -  Políticas de privacidad de la plataforma">
        <meta name="description" content="Kabasto.com - Lee nuestras políticas de privacidad, e informate sobre nuestro compromiso con la seguridad de todos tus datos.">
    @endsection

@section('content')
    <div class="max-w-7xl w-full shadow rounded-md p-6 md:px-10 bg-white my-4 mx-auto">

        <div class="w-full text-center grid grid-cols-3">
            <div class="hidden md:block md:col-span-1 w-full my-5">
                <img class="mx-auto" src="{{ asset('support.svg') }}" alt="imagen Soporte" width="75%">
            </div>
            <div class="col-span-3 md:col-span-2 text-left">
                <small class="text-gray-500">Consúltanos sobre cualquier duda o recomendación que tengas</small>
                <h1 class="text-3xl font-semibold">Soporte y Ayuda</h1>
                <span class="text-gray-700">
                    Nos encantaría saber todas tus dudas y ayudarte a solucionarlas. <br>
                    ¡Tranquilo! estamos para servirte
                    y ayudarte a incrementar tus ventas.
                </span>
                <p class="text-gray-700">
                    <br>
                    Si tienes alguna recomendación sobre la plataforma, ten la plena confianza en comentarnosla,
                    estamos enfocados en mejorar todo aspecto del sitio web, y con tus recomendaciones podremos lograrlo!
                    <br>
                    Puedes escribirnos a cualquier hora del día, o de la noche ;), incluso en la madrugada!.
                    Apenas leamos tu mensaje correremos a responderte!
                </p>
            </div>
        </div>

        <hr class="my-6">


        <h2 class="text-lg mt-2 font-semibold">
            ¿Dónde puedo preguntar?
        </h2>

        <p>
            Puedes escribirnos en cualquiera de los siguientes medios:
            <br>
            soporte@kabasto.com
            <br>
            info@kabasto.com
            <br>
            @kabasto_ve en Instagram
            <br>
            @kabasto.ve en Facebook
            <br>
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            ¿A qué hora puedo escribir?
        </h2>

        <p>
            ¡A cualquier hora! <br>
            No te limites por el horario, realiza una consulta cuando desees hacerla. <br>
            Te responderemos inmediatamente leamos tu mensaje.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            ¿Puedo preguntar sobre cualquier cosa?
        </h2>

        <p>
            ¡Claro que sí! <br>
            Puedes preguntarnos cualquier duda que tengas en mente. <br>
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            Si algo de la plataforma no me gusta, ¿Puedo sugerir algo mejor o una posible solución?
        </h2>

        <p>
            Seria excelente! <br>
            Nos encantaría poder escuchar todas tus ideas de mejora. <br>
            Estamos en constante creciemiento y tus sugerencias serían una prioridad para nosotros.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            ¿Cuales son sus redes sociales?
        </h2>

        <p>
            Facebook <a class="text-blue-600" href="https://www.facebook.com/kabasto.ve" target="_blank">@kabasto.ve</a>
            <br>
            Instagram <a class="text-blue-600" href="https://www.instagram.com/kabasto_ve/" target="_blank">@kabasto_ve</a>
            <br>
            Twitter <a class="text-blue-600" href="https://twitter.com/kabasto_ve" target="_blank">@kabasto_ve</a>
            <br>
            <span class="text-semibold">Siguenos!!</span>
        </p>

        <hr class="my-6">


    </div>

@endsection

