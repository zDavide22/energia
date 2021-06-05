<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('/images/logo/energia/logo_small_icon_only_inverted.png') }}">
        <title>Energy+</title>
    </head>
    <body x-data="{ showModal1: false, showModal2: false}" :class="{'overflow-y-hidden': showModal1 || showModal2}">
        @include('admin.layout.navadmin')
        @if (\Session::has('error'))
        <div style=" margin-left:auto; margin-right:auto" class="w-full md:w-1/2 block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Error!</strong> {!! \Session::get('error') !!}
                <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
                </button>
            </div>   
        @endif
        <div class="bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-10 shadow-md">
            <div class="py-8 px-8 rounded-xl">
                <h1 class="font-medium text-2xl mt-3 text-center" >Seleziona la tabella</h1>
                <form action="{{ route('tabella') }}" class="mt-6" method="GET">
                    <div class="mt-4">
                        
                        <select name="table" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="clienti">Clienti</option>
                            <option value="contratti">Contratti</option>
                            <option value="contatore">Contatore</option>
                            <option value="bollette">Bollette</option>
                        </select>
                    </div><br>

                    <button class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-black w-full" type="submit">Invio</button>
                </form>
            </div>
        </div>
        <main>
            {{ $slot }}
        </main>

        @include('footer')
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>