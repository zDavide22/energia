<x-imprese-layout>
    <form action="{{ route('ContrattiI') }}" method="POST">
         @csrf
        <div class="bg-white-200 min-h-screen pt-2 font-mono my-16">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">Attivazione del contratto</h2>
                    <div class="personal w-full border-t border-gray-400 pt-4">
                        <h2 class="text-2xl text-gray-900">Inserisci i dati:</h2>
                        <div class="md:flex md:items-center md:justify-between md:mt-4">
                            <div class='w-full md:w-1/2 px-3 mb-6'>
                                <input type="hidden" name="idCliente" value="{{ $idCliente[0]['id'] }}">
                                <input type="hidden" name="idContratto" value="{{ $contratto[0]['id'] }}">
                                <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold' >Nome</label>
                                <input class='py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="name" value="{{ $idCliente[0]['name'] }}"  readonly>
                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6'>
                                <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold' >Cognome</label>
                                <input class='py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="cognome" value="{{ $idCliente[0]['cognome'] }}" readonly>
                            </div>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Email:</label>
                            <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="email" value="{{ $idCliente[0]['email'] }}" readonly>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Ragione Sociale</label>
                            <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="email" value="{{ $idCliente[0]['ragSociale'] }}" readonly>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Partita IVA</label>
                            <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="email" value="{{ $idCliente[0]['pIVA'] }}" readonly>
                        </div>
                    </div>
                
                        <div class='flex flex-wrap -mx-3 mb-6'>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Indirizzo</label>
                                <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="indirizzo" placeholder="Inserisci la via" required>
                            </div>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Citta</label>
                                <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='text' name="citta" placeholder="Inserisci la città" required>
                            </div>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>CAP</label>
                                <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='number' name="cap" placeholder="Inserisci il CAP" required>
                            </div>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Data di attivazione</label>
                                <input class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type='date' name="data" id="date" readonly>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> Conferma</button>
        </div>
    </form>
        <script type="text/javascript">
            var date = new Date();
            date=date.toJSON().slice(0, 10).replace('T', ' ');
          document.getElementById('date').value = date;
        </script>
    </x-imprese-layout>