<x-user-layout>
    <br><br><form action="{{ route('scarica') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="w-full flex flex-wrap justify-center"><button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
            <span>Scarica il PDF</span>
          </button></div>
    </form><br>
    <div class="md:mx-auto md:min-w-screen md:flex md:flex-wrap md:justify-center ">
        <div class="md:mx-auto w-full px-2">
            <div class=" md:mx-auto bg-white text-black rounded-lg relative min-w-0 break-words overflow-hidden shadow-lg mb-4 md:w-2/3 bg-white dark:bg-gray-900">
                <div class="px-6 py-6 relative">
                    <div class="flex mb-4 justify-between items-center">
                        <div class="ml-10 md:ml-20">
                            <h5 class="mb-0">{{ $cliente->name }} {{ $cliente->cognome }}</h5>
                            <h6 class="mb-0">{{ $cliente->indirizzo }}</h6>
                            <h6 class="mb-0">{{ $cliente->cap }} {{ $cliente->citta }} </h6>
                        </div>
                        <div class="text-right">
                            @if ($contratto->tipo=='Luce')
                            <img src="images/logo/luce/logo_small_icon_only_inverted.png" height="70px" width="70px" alt="" class="mr-20">
                            @else
                            <img src="images/logo/gas/logo_small_icon_only_inverted.png" height="70px" width="70px" alt="" class="mr-20">
                            @endif
                        </div>
                    </div>
                    <div class="block sm:flex justify-between items-center flex-wrap ml-10 md:ml-20">


                        <div class="w-full sm:w-full">
                            <div class="flex mb-2 justify-between items-center"><span class="font-medium text-xl">DATI FORNITURA</span></div>
                        </div>
                        <div class="w-full sm:w-full">
                            <div class="flex mb-2 justify-between items-center"><span>Indirizzo di fornitura: {{ $contratto->indirizzo }}, {{ $contratto->citta }} {{ $contratto->cap }}</span></div>
                        </div>
                        <div class="w-full sm:w-full">
                            <div class="flex mb-2 justify-between items-center"><span>Modalità di pagamento: CARTA DI CREDITO</span></div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-6 relative">
                    <div class="text-center md:justify-between md:items-center md:flex" style="flex-flow: initial;">
                        <div class="w-full lg:w-1/3 ml-10 mr-10">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-sm text-gray-600">N°Cliente: {{ $cliente->id }}</div>
                                        <div class="text-sm text-gray-600">@if ($contratto->tipo=='Luce')
                                            POD: {{ $contatore->POD }}
                                            @else
                                            PDR: {{ $contatore->PDR }}
                                            @endif </div>
                                        <div class="text-sm text-gray-600">Fornitura @if ($contratto->tipo=='Luce')
                                            energia elettrica
                                        @else
                                            gas
                                        @endif    
                                        </div>
                                        <div class="text-sm text-gray-600">Periodo: {{ $data->mese }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/3 ml-10 mr-10">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-green-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">DATI BOLLETTA</div>
                                        <div class="text-sm text-gray-600"><span style="font-weight: bold">Consumi fatturati: </span> {{ $data->consumo }}</div>
                                        <div class="text-sm text-gray-600"><span style="font-weight: bold">N. Fattura:</span> {{ $data->id }}</div>
                                        <div class="text-sm text-gray-600"><span style="font-weight: bold">Del:</span> {{ $data->data }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/3 ml-10 mr-10">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-yellow-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-yellow-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">CONTRATTO</div>
                                        <div class="text-sm text-gray-600">@if ($contratto->tipo=='Luce')
                                            <span style="font-weight: bold">kW erogabili:</span>  {{ $contratto->kwmassimi }}
                                            @else    
                                            <span style="font-weight: bold">Smc:</span>  {{ $contratto->mcgas }}
                                            @endif</div>
                                        <div class="text-sm text-gray-600"><span style="font-weight: bold">Prezzo: </span>{{ $contratto->prezzoKw }}</div>
                                        <div class="text-sm text-gray-600"><span style="font-weight: bold">Data di attivazione:</span> {{ $contratto->dataAttivazione }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:ml-20 md:mr-20 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th colspan="3"
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Dettaglio fiscale
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Costo
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                   @if ($data->tipo=='Luce')
                                                   Spesa per l'energia
                                                   @else
                                                    Spesa per il gas naturale
                                                   @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->quotavariabile }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Spesa trasporto e gestione contatore
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->spesatrasporto }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-400 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Spesa oneri di sistema
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-400 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->quotafissa }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap" style="font-weight: bold">
                                                    Importo totale da pagare
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->totale }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('indietro') }}" method="POST">
        @csrf
        <input type="text" name="id" class="hidden" value="{{ $data->id }}">
        <div>
            <button type="submit" class="block w-full max-w-xs mx-auto border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 focus:bg-gray-800 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> Torna indietro</button>
        </div>
    </form>
</x-user-layout>