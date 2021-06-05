<x-imprese-layout>
    @if (\Session::has('error'))
        <div style=" margin-left:auto; margin-right:auto" class="w-full md:w-1/2 block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
        <strong class="mr-1">Error!</strong> {!! \Session::get('error') !!}
        <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
            <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
        </button>
        </div>
    </div>
         
@endif
    <br>
    @if (!empty($letture)&&!empty($lettureG))
    <div class="md:flex md:flex-cols-2 md:w-full">
        <div class="md:flex md:flex-cols-2 md:w-full w-5/6 ml-10 mr-10 mb-5 md:mb-0">
        <canvas id="myChart" width="400" height="200"></canvas>
        </div>
        <div class="md:flex md:flex-cols-2 md:w-full w-5/6 ml-10 mr-10">
            <canvas id="myChart2" width="400" height="200"></canvas>
        </div>    
    </div>
    @elseif (!empty($letture))
    <div class="flex mx-auto w-5/6">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
    @elseif (!empty($lettureG))
    <div class="flex mx-auto w-5/6">
        <canvas id="myChart2" width="400" height="200"></canvas>
        </div>
     @else
     <br>
    <h1 class="w-5/6 md:w-full my-2 text-3xl font-bold leading-tight text-center text-red-500">
        Nessuna lettura effettuata
      </h1>
      <br>
    @endif
    <div class="mt-5 flex flex-wrap justify-center">
        <button
        type="button"  @click="showModal1 = true"
        class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline"
      >
        LETTURA LUCE
      </button>
      <button
        type="button" @click="showModal2 = true"
        class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
      >
        LETTURA GAS
      </button>
    </div>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Contratti Luce</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    kW Massimo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Prezzo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Prezzo al kw
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Data Attivazione
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Indirizzo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Città
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    CAP
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    id Contatore
                                </th>
                                <th colspan="2"
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Azioni                                
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                @if ($item->tipo=='Luce')
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->kwmassimi }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->prezzo }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->prezzoKw }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->dataAttivazione }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->indirizzo }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->citta }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->cap }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->idC }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <form action="{{ Route('BolletteI') }}" method="POST" class="mt-4">
                                            @csrf
                                            <input type="date" name="data" class="hidden data" >
                                            <input type="text" name="mese" class="hidden mese" >
                                            <input type="text" name="anno" class="hidden anno" >
                                            <input type="text" name="id" class="hidden" value="{{ $item->id }}">
                                            <input type="text" name="tipo" class="hidden" value="Luce">
                                            <button
                                                type="submit"
                                                class="border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                                            >
                                                Bollette
                                            </button>
                                        </form>
                                            </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <form action="{{ Route('removeConI') }}" method="POST" class="mt-4">
                                                @csrf
                                                <input type="text" name="id" class="hidden" value="{{ $item->id }}">
                                                <button type="submit"
                                                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none"
                                                >
                                                    DISDICI
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Contratti Gas</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Metri cubi (smc)
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Prezzo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Prezzo al metro cubo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Data Attivazione
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Indirizzo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Città
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    CAP
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    id Contatore
                                </th>
                                <th colspan="2"
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Azioni
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                @if ($item->tipo=='Gas')
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">1</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->prezzo }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->prezzoKw }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->dataAttivazione }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->indirizzo }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->citta }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->cap }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->idC }}</p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <form action="{{ Route('BolletteI') }}" method="POST" class="mt-4">
                                            @csrf
                                            <input type="text" name="id" class="hidden" value="{{ $item->id }}">
                                            <input type="date" name="data" class="hidden data">
                                            <input type="text" name="mese" class="hidden mese">
                                            <input type="text" name="anno" class="hidden anno" >
                                            <input type="text" name="tipo" class="hidden" value="Gas">
                                            <button
                                                type="submit"
                                                class="border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                                            >
                                                Bollette
                                            </button>
                                        </form>
                                            </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <form action="{{ Route('removeConI') }}" method="POST" class="mt-4">
                                                @csrf
                                                <input type="text" name="id" class="hidden" value="{{ $item->id }}">
                                                <button type="submit"
                                                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none"
                                                >
                                                    DISDICI
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<div
  class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
  x-show="showModal1"
  x-transition:enter="transition duration-300"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition duration-300"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
>
  <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
    <div
      class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
      @click.away="showModal1 = false"
      x-show="showModal1"
      x-transition:enter="transition transform duration-300"
      x-transition:enter-start="scale-0"
      x-transition:enter-end="scale-100"
      x-transition:leave="transition transform duration-300"
      x-transition:leave-start="scale-100"
      x-transition:leave-end="scale-0"
    >
      <header class="flex items-center justify-between p-2">
        <h2 class="font-semibold" style="text-align: center">Lettura contatore Luce</h2>
        <button class="focus:outline-none p-2" @click="showModal1 = false">
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
            ></path>
          </svg>
        </button>
      </header>
      <main class="p-2 text-center">
      <form action="{{ Route('letturaGraficoI') }}" method="POST">
        @csrf
        <label class="block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="idC">Inserisci ID del contatore da leggere:</label>
        <select class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' name="idC" class="mb-2">
            @foreach ($data as $item)
            @if($item->tipo=='Luce')
                <option value="{{ $item->idC }}">{{ $item->idC }}</option>
            @endif
            @endforeach
            <input type="text" name="dataG" class="hidden dataG"> <br>
        <input type="text" name="tipo" value="Luce" class="hidden"> <br>
        <button type="submit" class="bg-yellow-400 font-semibold text-white p-2 w-32 rounded-full hover:bg-yellow-500 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Leggi</button>
        </form>
      </main>
    </div>
  </div>
</div>

<div
  class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
  x-show="showModal2"
  x-transition:enter="transition duration-300"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition duration-300"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
>
  <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
    <div
      class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
      @click.away="showModal2 = false"
      x-show="showModal2"
      x-transition:enter="transition transform duration-300"
      x-transition:enter-start="scale-0"
      x-transition:enter-end="scale-100"
      x-transition:leave="transition transform duration-300"
      x-transition:leave-start="scale-100"
      x-transition:leave-end="scale-0"
    >
      <header class="flex items-center justify-between p-2">
        <h2 class="font-semibold" style="text-align: center">Lettura contatore Gas</h2>
        <button class="focus:outline-none p-2" @click="showModal2 = false">
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
            ></path>
          </svg>
        </button>
      </header>
      <main class="p-2 text-center">
      <form action="{{ Route('letturaGraficoI') }}" method="POST">
        @csrf
        <label class="block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="idC">Inserisci ID del contatore da leggere:</label>
        <select style="text-align: center" class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' name="idC" class="mb-2">
            @foreach ($data as $item)
            @if($item->tipo=='Gas')
                <option style="text-align: center" value="{{ $item->idC }}">{{ $item->idC }}</option>
            @endif
            @endforeach
        </select><p class="text-blue-800 text-xs italic">Puoi inserire solo ID per leggere tutti i consumi segnati dal contatore</p><br><br>
        <label class="block uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="mcgas">Inserisci il valore:</label>
        <input style="text-align: center" class='w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent' type="number" name="mcgas" min="0" step="0.001" placeholder="Smc (opzionale)" id="mcgas"><br>
        <input type="text" name="dataGas" class="hidden dataGas"> <br>
        <input type="text" name="tipo" value="Gas" class="hidden"> <br>
        <button type="submit" class="bg-blue-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Leggi</button>
        </form>
      </main>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <script>
        var date = new Date();
        date.setHours( date.getHours()+2);
        date=date.toJSON().slice(0, 10).replace('T', ' ');
        var date2 = new Date();
        date2.setHours( date2.getHours()+2);
        date2=date2.toJSON().slice(0, 10).replace('T', ' ');
        var x = document.getElementsByClassName('data');
        var g = document.getElementsByClassName('dataG');
        var date3 = new Date();
        date3.setHours( date3.getHours()+2);
        date3=date3.toJSON().slice(0, 10).replace('T', ' ');
        var g2 = document.getElementsByClassName('dataGas');
        var data = new Date();
        var mese = data.getMonth();
        var anno = new Date().getFullYear();
        var y = document.getElementsByClassName('mese');
        var z = document.getElementsByClassName('anno');
        for(i = 0; i < x.length; i++) {
        x[i].value = date;
        y[i].value = mese;
        z[i].value = anno;
        g[i].value = date2;
        g2[i].value = date3;
        }
      </script>

      <script>
          var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($date); ?>,
                    datasets: [{
                        label: 'Consumi Luce (kW)',
                        data: <?php echo json_encode($letture); ?>,
                        backgroundColor:'rgba(255, 200, 0,0.5)',
                        borderColor:'rgba(255, 200, 0,1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
      </script>

      <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($dateG); ?>,
                datasets: [{
                    label: 'Consumi Gas (smc)',
                    data: <?php echo json_encode($lettureG); ?>,
                    backgroundColor:'rgba(54, 162, 235, 0.5)',
                    borderColor:'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
      </script>
</x-imprese-layout>