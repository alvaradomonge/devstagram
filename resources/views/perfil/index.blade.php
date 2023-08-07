@extends('layouts.app')

@section('titulo')
    Edtitar perfil de: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" action="{{route('perfil.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                    <input 
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Tu Nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{auth()->user()->username}}"
                    />
                </div>
                <div class="mb-5">
                    <label id="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>
                    <input 
                    type="file"
                    name="imagen"
                    id="imagen"
                    accept=".jpg, .jpeg, .png"
                    class="border p-3 w-full rounded-lg "
                    value=""
                    />
                </div>
                <input
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection