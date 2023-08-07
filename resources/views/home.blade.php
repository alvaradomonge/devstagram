@extends('layouts.app')

@section('titulo')
Pagina principal
@endsection

<hr>

@section('contenido')
    @auth
        <x-listar-post :posts="$posts"/>
    @endauth
    @guest
        <div class="md:flex md:justify-center md:gap-10 md:items-center">
            <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                <p class="text-gray-600- uppercase text-sm text-center font-bold">Bienvenido a Devstagram</p>
                <br>
                <div class="flex justify-center">
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{route('login')}}">Inicie sesión</a>
                    <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800" href="{{route('register')}}">Crea una cuenta</a>
                </div>
            </div>
        </div>
    @endguest
@endsection

