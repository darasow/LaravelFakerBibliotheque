<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
         <p class="text-start text-xl font-thin">Date d'emprunt : {{$emprunt->date_emprunt}}</p>
         <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6"><a href="{{route('admin.client.show', ['client' => $emprunt->client_id])}}" class="w-full block">Emprunter par : {{$emprunt->client->nom}}</a></h1> 
         <p class=" flex items-center justify-center"><a href="{{route('admin.livre.show', ['livre' => $emprunt->livre_id])}}" class="w-full block">Titre livre : {{$emprunt->livre->titre}} </a></p>
         
         <div class="flex items-center justify-around ">
            <a href="{{ route('admin.emprunt.edit', ['emprunt' => $emprunt->id]) }}">Modifier</a>
            <form method="post" action="{{ route('admin.emprunt.destroy', $emprunt) }}" class="inline">
                  @csrf
                  @method('delete')
                  <button class="text-red-500">Supprimer</button>
            </form>
            <a href="{{ route('admin.emprunt.show', ['emprunt' => $emprunt->id]) }}">Detail</a>
        </div>
      </div>
      
</div>