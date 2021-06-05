<x-admin-layout>
  <div class="mt-5 flex flex-wrap justify-center">
    <button class="bg-blue-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black"   @click="showModal2 = true">
        UPDATE
    </button>
</div><br><br>
  <div class="overflow-x-auto">

    <div class="min-w-screen m-10 flex items-center justify-center font-sans md:overflow-hidden overflow-y-hidden overflow-x-scroll">
        <div class="w-full lg:w-5/6">
          <div class="w-5/6 md:w-1/3 mx-auto relative text-gray-600">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Inserisci l'email del cliente da cercare.." title="Inserisci l'email del cliente da cercare" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <button type="button" class="absolute right-0 top-0 mt-3 mr-4">
              <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
              </svg>
            </button>
          </div>
            <div class="bg-white shadow-md rounded my-6">
                <table id="myTable" class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Id</th>
                        <th class="py-3 px-6 text-left">Nome</th>
                        <th class="py-3 px-6 text-left">Cognome</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Telefono</th>
                        <th class="py-3 px-6 text-left">Ruolo</th>
                        <th class="py-3 px-6 text-left">Ragione Sociale</th>
                        <th class="py-3 px-6 text-left">Partita IVA</th>
                        <th class="py-3 px-6 text-left">Azioni</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($data as $item)
                      @if($item->id!=1)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $item->id }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->cognome }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->email }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->telefono }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{   $item->ruolo }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->ragSociale }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{   $item->pIVA }}
                        </td>
                        <td class="py-3 px-6 text-center">
                        <form action="{{ Route('removeCliente') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="text" name="id" class="hidden" value="{{ $item->id }}">
                            <button>
                            <div class="flex item-center justify-cente font-semibold text-red p-2 transition-all duration-300"> 
                                <div class="w-4 mr-2 rounded-full transform hover:text-orange-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </div>
                            </button>
                        </form>
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
        <h2 class="font-semibold" style="text-align: center">Modify</h2>
        <button class="focus:outline-none p-2" @click="showModal2 = false">
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
            ></path>
          </svg>
        </button>
      </header>
      <main class="p-2 text-center flex items-center justify-center">
      <form action="{{ Route('updateCliente') }}"  method="POST">
        @csrf
        <label for="id">Seleziona ID del cliente da modificare:</label><br>
        <select name="id" id="id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            @foreach ($data as $item)
            @if($item->id!=1)
                <option value="{{ $item->id }}">{{ $item->id }}</option>
            @endif
            @endforeach
        </select><br>
        <input type="text" name="name" placeholder="Cambia il nome" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" min="0"> <br>
        <input type="text" name="cognome" placeholder="Cambia il cognome" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"> <br>
        <input type="email" name="email" placeholder="Cambia la email" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"> <br>        
        <input type="password" name="password" placeholder="Cambia la password" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"> <br>
        <input type="number" name="telefono" placeholder="Cambia numero di telefono" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" > <br>
        <button type="submit" class="bg-blue-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Modifica</button>
        </form>
      </main>
    </div>
  </div>
</div>
<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  </script>
</x-admin-layout>