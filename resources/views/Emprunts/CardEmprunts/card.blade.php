<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
         <p class="text-start text-xl font-thin">Date d'emprunt : {{$emprunt->date_emprunt}}</p>
         <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6"><a href="{{route('clients.show', ['client' => $emprunt->client_id])}}" class="w-full block">Emprunter par : {{$emprunt->client->nom}}</a></h1> 
         <p class=" flex items-center justify-center"><a href="{{route('livres.show', ['livre' => $emprunt->livre_id])}}" class="w-full block">Titre livre : {{$emprunt->livre->titre}} </a></p>
      </div>
      
</div>