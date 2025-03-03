{{-- <x-guest-layout> --}}
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('styles/logIn.css') }}">
        <title>LogIn</title>
    </head>
    <body class="containerP">
        <form class="form" action="{{ route('login') }}" method="POST">
            @csrf
            <img class="logoRolserP" src="{{ asset('images/logoPequenyoRolser.png') }}" alt="Logo pequeño">
            <img src="{{ asset('images/logoGrandeRolser.png') }}" alt="Logo grande">

            <div class="contenedorInputs">
                <!-- Usuario -->
                <div class="rectoInput">
                    <svg width="32" height="32" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="separacionInput">
                        <path d="M13.5 13.5C16.6066 13.5 19.125 10.9816 19.125 7.875C19.125 4.7684 16.6066 2.25 13.5 2.25C10.3934 2.25 7.875 4.7684 7.875 7.875C7.875 10.9816 10.3934 13.5 13.5 13.5Z" stroke="#FDF3F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23.1639 24.75C23.1639 20.3963 18.8327 16.875 13.5002 16.875C8.16767 16.875 3.83643 20.3963 3.83643 24.75" stroke="#FDF3F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input class="inputU" type="text" name="usuario_nombre" placeholder="Usuario" value="{{ old('usuario_nombre') }}" required autofocus>
                </div>
                <x-input-error :messages="$errors->get('usuario_nombre')" />

                <!-- Contraseña -->
                <div class="rectoInput">
                    <svg width="32" height="32" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="separacionInput">
                        <path d="M12.3975 21.9375H8.4375C7.74 21.9375 7.12125 21.915 6.57 21.8362C3.61125 21.51 2.8125 20.115 2.8125 16.3125V10.6875C2.8125 6.885 3.61125 5.49 6.57 5.16375C7.12125 5.085 7.74 5.0625 8.4375 5.0625H12.33" stroke="#FDF3F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.8975 5.0625H18.5625C19.26 5.0625 19.8787 5.085 20.43 5.16375C23.3887 5.49 24.1875 6.885 24.1875 10.6875V16.3125C24.1875 20.115 23.3887 21.51 20.43 21.8362C19.8787 21.915 19.26 21.9375 18.5625 21.9375H16.8975" stroke="#FDF3F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.875 2.25V24.75" stroke="#FDF3F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.4811 13.5H12.4912" stroke="#FDF3F4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.98113 13.5H7.99123" stroke="#FDF3F4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input class="inputU" type="password" name="password" placeholder="Contraseña" required>
                </div>
                <x-input-error :messages="$errors->get('password')"/>
            </div>

            <!-- Olvidaste tu contraseña -->
            @if (Route::has('password.request'))
                <a class="mpOlvidada" href="{{ route('password.request') }}">¿Has olvidado la contraseña?</a>
            @endif

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="recordar-check" name="remember">
                    <span class="recordar">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <!-- Botón de inicio de sesión -->
            <button class="inputIS" type="submit">Iniciar Sesión</button>
        </form>
    </body>
{{-- </x-guest-layout> --}}
