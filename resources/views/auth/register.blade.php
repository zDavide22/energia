<x-guest-layout>
    <x-auth-card>
        <div class="w-full md:w-1/3 mt-6 md:px-20 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div name="logo" class="p-10">
            <a href="/">
                <img src="images/logo/energia/logo_small_icon_only_inverted.png" class="mx-auto" width="100" height="100" alt="">
            </a>
        </div>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="flex flex-col-2 ml-5 md:w-full">
                        <!-- Name -->
                        <div class="mr-5">
                            <x-label for="name" :value="__('Nome')" />
            
                            <x-input id="name" class="block mt-1 w-5/6" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <!-- Cognome -->
                        <div>
                            <x-label for="cognome" :value="__('Cognome')" />
            
                            <x-input id="cognome" class="block mt-1 w-5/6" type="text" name="cognome" :value="old('cognome')" required autofocus />
                        </div>
                    </div>
                        <!-- Email Address -->
                        <div class="mt-4 ml-5">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-5/6" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div class="mt-4 ml-5">
                            <x-label for="indirizzo" :value="__('Indirizzo')" />
            
                            <x-input id="indirizzo" class="block mt-1 w-5/6" type="text" name="indirizzo" :value="old('indirizzo')" required />
                        </div>
                        <div class="flex flex-col-2 w-full">
                        <div class="mt-4 mr-5 ml-5">
                            <x-label for="citta" :value="__('Città')" />
            
                            <x-input id="citta" class="block mt-1 w-5/6" type="text" name="citta" :value="old('citta')" required />
                        </div>
                        <div class="mt-4 ml-5">
                            <x-label for="cap" :value="__('CAP')" />
            
                            <x-input id="cap" class="block mt-1 w-5/6" type="number" min="0" max="99999" name="cap" :value="old('cap')" required />
                        </div>
                    </div>
                        <!-- Telefono -->
                        <div class="mt-4 ml-5">
                            <x-label for="telefono" :value="__('Telefono')" />
            
                            <x-input id="telefono" pattern="^\d{10}$" class="block mt-1 w-5/6" type="tel" name="telefono" :value="old('telefono')"  required autofocus />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4 ml-5">
                            <x-label for="password" :value="__('Password')" />
            
                            <x-input id="password" class="block mt-1 w-5/6"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
                    
                        <!-- Confirm Password -->
                        <div class="mt-4 ml-5">
                            <x-label for="password_confirmation" :value="__('Conferma la password')" />
            
                            <x-input id="password_confirmation" class="block mt-1 w-5/6"
                                            type="password"
                                            name="password_confirmation" required />
                        </div>
                        <div class="mt-4 ml-5">
                            <x-label for="role_id" value="{{ __('Inserisci il ruolo:') }}" />
                            <select name="role_id" onchange='checkImpresa(this.value);' class="block mt-1 w-5/6 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="user">Cliente</option>
                                <option value="imprese">Impresa</option>
                            </select>
                        </div>
                        <!-- Ragione Sociale -->
                        <div id="divimpresa" class="mt-4 ml-5" style="display: none">
                            <div>
                                <x-label for="rags" value="{{ __('Inserisci la ragione sociale:') }}" />
                                <input class="block mt-1 w-5/6 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" id="rags" name="rags" placeholder="Inserisci la ragione sociale" class="mb-2"> <br>
                            </div>
                            <div>
                                <x-label for="role_id" value="{{ __('Inserisci la partita IVA:') }}" />
                                <input class="block mt-1 w-5/6 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" id="piva" name="piva" placeholder="Inserisci la partita IVA" class="mb-2"> <br>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center md:justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Sei già registrato?') }}
                            </a>
            
                            <x-button class="ml-4">
                                {{ __('Registrati') }}
                            </x-button>
                        </div>
                    </form>
            
            
                    <script type="text/javascript">
                        function checkImpresa(val){
                         var element=document.getElementById('divimpresa');
            
                         if(val=='imprese')
                           element.style.display='block';
                         else  
                           element.style.display='none';
                        }
                        
                        </script> 
        </div>
    </x-auth-card>
</x-guest-layout>
