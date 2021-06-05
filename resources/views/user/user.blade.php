<x-user-layout>
    <div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto " style="margin-top:0; background-image:url(images/sfondo.png); background-size:cover;">
        <div class="container max-w-5xl mx-auto px-4">
          <div class="w-4/5">
            <h1 class="mt-32 text-black text-6xl font-bold">#Energy+, l’energia per guardare avanti</h1>
          </div>
          <div class="w-5/6 my-10 ml-6">
            <h3 class="text-black">
              Scopri la nostra visione per una crescita sostenibile
            </h3>
          </div>
          <div class="text-black font-bold relative">
            <div class="grid md:grid-cols-3 md:grid-cols-3 md:grid-cols-3 gap-3 uppercase mt-7">
              <div class="group flex items-center bg-white shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-gray-200 ring-gray-200 mt-5 cursor-pointer hover:bg-gray-200  transition m-7">
                <img class="w-9" src="/images/luce.png" alt="" />
                <div>
                  <span>Energia verde</span>
                  <span class="text-xs text-gray-800 block">Il 100% dell’energia elettrica proviene da fonti rinnovabili.</span>
                </div>
                <div>
                  <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                </div>
              </div>
      
      
              <div class="group flex items-center bg-white shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-gray-200 ring-gray-200 mt-5 cursor-pointer hover:bg-gray-200  transition m-7">
                <img class="w-9" src="/images/soldi.png" alt="" />
                <div>
                  <span>Convenienza</span>
                  <span class="text-xs text-gray-800 block">Con l’attivazione online ti assicuriamo sempre il nostro miglior prezzo.</span>
                </div>
                <div>
                  <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                </div>
              </div>
      
              <div class="group flex items-center bg-white shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-gray-200 ring-gray-200 mt-5 cursor-pointer hover:bg-gray-200  transition m-7">
                <img class="w-9" src="/images/computer.png" alt="" />
                <div>
                  <span>100% digital</span>
                  <span class="text-xs text-gray-800 block">Fai tutto online: dall’attivazione dell’offerta alla bolletta digitale.</span>
                </div>
                <div>
                  <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="py-16">
        <div class="container m-auto px-6">
      
         <div class="lg:flex justify-between items-center">
             <div class="lg:w-6/12 lg:p-0 p-7">
                <h1 class="text-4xl font-bold leading-tight mb-5 capitalize">  Dai più luce alla tua casa con #Energy+ </h1>
                <p class="text-xl">  Illumina la tua casa, è semplice: scopri le offerte luce più adatte ai tuoi consumi. Puoi scegliere un prezzo più conveniente se consumi più di sera o nei weekend o bloccare un prezzo vantaggioso fisso per tutto il giorno. Dai nuova luce alla tua casa! </p>
      
                <div class="py-5">
                     <a href="{{ route('luce') }}" class="text-white rounded-full py-2 px-5 text-lg font-semibold bg-green-600 inline-block border border-green-600 mr-3 hover:bg-green-400 hover:text-white hover:border-green-400 ">Vedi offerte</a>
                </div>
      
              </div>
              <div class="lg:w-5/12 order-2">
                <img src="images/Luce.jpg" style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg);" alt="" class="rounded ">
              </div>
          </div>
      
        </div>
      </div>

      <div class="py-16">
        <div class="container m-auto px-6">
      
         <div class="lg:flex justify-between items-center">
             <div class="lg:w-6/12 lg:p-0 p-7">
                <h1 class="text-4xl font-bold leading-tight mb-5 capitalize">  Riscalda la tua casa con #Energy+ </h1>
                <p class="text-xl">La sicurezza e la tranquillità delle offerte gas di Energy+ pensate per la tua casa. Scegli la soluzione migliore per te, scegli il gas di Energy+!</p>
      
                <div class="py-5">
                     <a href="{{ route('gas') }}" class="text-white rounded-full py-2 px-5 text-lg font-semibold bg-blue-600 inline-block border border-blue-600 mr-3 hover:bg-blue-400 hover:text-white hover:border-blue-400 ">Vedi offerte</a>
                </div>
      
              </div>
              <div class="lg:w-5/12 order-2">
                <img src="images/gas.jpg" style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg);" alt="" class="rounded ">
              </div>
          </div>
      
        </div>
      </div>

      <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">
        Perché scegliere Energy+
      </h1><br><br><br><br>
      <div class="flex items-center justify-center">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <!-- 1 card -->
            <div class="bg-white py-6 px-6 w-64 my-4 text-center rounded-md shadow-lg transform -translate-y-20 sm:-translate-y-24 max-w-xs mx-auto">
              <img class="w-20 h-20 object-cover rounded-full mx-auto shadow-lg" src="/images/earth.png"><br>
              <h2 class="font-semibold text-gray-700 text-2xl mb-6">Perché pensi anche all'ambiente</h2>
              <p class="capitalize text-x2 mt-1">Insieme, ogni giorno, costruiamo un nuovo modello energetico sempre più sostenibile e accessibile, basato sull'elettricità prodotta da fonti rinnovabili.</p>
            </div>
            <div class="bg-white py-6 px-6 w-64 my-4 text-center rounded-md shadow-lg transform -translate-y-20 sm:-translate-y-24 max-w-xs mx-auto">
              <img class="w-20 h-20 object-cover rounded-full mx-auto shadow-lg" src="/images/cube.png"><br>
              <h2 class="font-semibold text-gray-700 text-2xl mb-6">Perché cerchi una realtà solida</h2>
              <p class="capitalize text-x2 mt-1">Come Gruppo Energy+ abbiamo oltre 100 anni di esperienza: il nostro impegno, il nostro entusiasmo e la nostra propositività sono al tuo servizio.</p>
            </div>
            <div class="bg-white py-6 px-6 w-64 my-4 text-center rounded-md shadow-lg transform -translate-y-20 sm:-translate-y-24 max-w-xs mx-auto">
              <img class="w-20 h-20 object-cover rounded-full mx-auto shadow-lg" src="/images/customer.jpg"><br>
              <h2 class="font-semibold text-gray-700 text-2xl mb-6">Perché meriti soluzioni su misura</h2>
              <p class="capitalize text-x2 mt-1">Consumi più energia il giorno o la sera? Oppure cerchi un prezzo bloccato? Cerca l'offerta migliore per l'ambiente e per le tue esigenze.</p>
            </div>
            <div class="bg-white py-6 px-6 w-64 my-4 text-center rounded-md shadow-lg transform -translate-y-20 sm:-translate-y-24 max-w-xs mx-auto">
              <img class="w-20 h-20 object-cover rounded-full mx-auto shadow-lg" src="/images/like.png"><br>
              <h2 class="font-semibold text-gray-700 text-2xl mb-6">Perché vuoi idee smart</h2>
              <p class="capitalize text-x2 mt-1">Grazie alla nostra App e all'Area Riservata sul sito, puoi fare tutto comodamente online. E se hai bisogno di informazioni o aiuto, siamo al tuo fianco con il Servizio Clienti e l'Assistenza Tecnica.</p>
            </div>
        </div>
    </div>
</x-user-layout>
