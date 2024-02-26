<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Nombre Usuario -->
        <div>
            <x-input-label for="nombre_usuario" :value="__('Nombre de usuario')" />
            <x-text-input id="nombre_usuario" class="block mt-1 w-full" type="text" name="nombre_usuario" :value="old('nombre')" required autofocus autocomplete="nombre_usuario" />
            <x-input-error :messages="$errors->get('nombre_usuario')" class="mt-2" />
        </div>

        <!-- correo  -->
        <div class="mt-4">
            <x-input-label for="correo" :value="__('Correo')" />
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" required autocomplete="correo" />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>
    <!-- Fecha  -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento" :value="__('Fecha_nacimiento')" />
            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autocomplete="fecha_nacimiento" />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- contrasenia -->
        <div class="mt-4">
            <x-input-label for="contrasenia" :value="__('Contrasenia')" />

            <x-text-input id="contrasenia" class="block mt-1 w-full"
                            type="password"
                            name="contrasenia"
                            required autocomplete="new-contrasenia" />

            <x-input-error :messages="$errors->get('contrasenia')" class="mt-2" />
        </div>

        <!-- Confirm contrasenia -->
        <div class="mt-4">
            <x-input-label for="contrasenia_confirmation" :value="__('Confirm contrasenia')" />

            <x-text-input id="contrasenia_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="contrasenia_confirmation" required autocomplete="new-contrasenia" />

            <x-input-error :messages="$errors->get('contrasenia_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Ya estas registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
