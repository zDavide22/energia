<x-user-layout>
    <br><br><br>
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
    <form action="{{ route('paga') }}" method="POST">
        @csrf
        <input type="text" name="id" class="hidden" value="{{ $data->id }}">
    <div class="flex items-center justify-center px-5 pb-10 pt-16 ">
        <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
            <div class="w-full pt-1 pb-5">
                <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20  mx-auto shadow-lg flex justify-center items-center">
                    <i class="mdi mdi-credit-card-outline text-3xl"></i>
                </div>
            </div>
            <div class="mb-10">
                <h1 class="text-center font-bold text-xl uppercase">Aggiungi un metodo di pagamento</h1>
            </div>
            <div class="mb-3 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                    </label>
                </div>
                <div class="px-2">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                        <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Intestatario</label>
                <div>
                    <input name="intestatario" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Nome Cognome" type="text" required/>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Numero della carta</label>
                <div>
                    <input name="nc" pattern="[0-9]{16}" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text" maxlength="16" required/>
                </div>
            </div>
            <div class="mb-3 -mx-2 flex items-end">
                <div class="px-2 w-1/2">
                    <label class="font-bold text-sm mb-2 ml-1">Scadenza</label>
                    <div>
                        <select name="meseS" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" required>
                            <option value="01">01 - Gennaio</option>
                            <option value="02">02 - Febbraio</option>
                            <option value="03">03 - Marzo</option>
                            <option value="04">04 - Aprile</option>
                            <option value="05">05 - Maggio</option>
                            <option value="06">06 - Giugno</option>
                            <option value="07">07 - Luglio</option>
                            <option value="08">08 - Agosto</option>
                            <option value="09">09 - Settembre</option>
                            <option value="10">10 - Ottobre</option>
                            <option value="11">11 - Novembre</option>
                            <option value="12">12 - Dicembre</option>
                        </select>
                    </div>
                </div>
                <div class="px-2 w-1/2">
                    <select name="annoS" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" required>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2029">2030</option>
                    </select>
                </div>
            </div>
            <div class="mb-10">
                <label class="font-bold text-sm mb-2 ml-1">Codice di sicurezza</label>
                <div>
                    <input name="cvv" pattern="[0-9]{3}" class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="CVV" maxlength="3" type="text" required/>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> Conferma</button>
    </div>
</form>
</x-user-layout>