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
    @foreach ($contratti as $item)
    <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="images/logo/luceicona.jpg" class="w-full relative z-10" alt="">
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5">Luce</h1>
                        <p class="text-sm">€ {{ $item->prezzo }} /mese*</p>
                        <p class="text-sm">{{ $item->kwmassimi }} kWh/mese</p>
                    </div>
                    <div>
                        <div class="block align-bottom mr-5">
                            <span class="text-2xl leading-none align-baseline">€ {{ $item->prezzoKw }}/kWh*</span>
                        </div>
                        <br>
                        <div class="block align-bottom">
                            <form action="{{ route('attivaI') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> Attiva</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-imprese-layout>