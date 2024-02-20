<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
         <img src="/storage/{{$client->image}}" alt="./Exemple.png" class="h-[100px] w-full" srcset="">
        <p class=" flex items-center justify-center">Nom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6">{{$client->nom}}</h1> 
        <p class=" flex items-center justify-center">Prenom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6">{{$client->prenom}}</h1>
        <div class="flex items-center justify-around ">
            <a href="{{ route('admin.client.edit', ['client' => $client->id]) }}">Modifier</a>
            <form method="post" action="{{ route('admin.client.destroy', $client) }}" class="inline">
                  @csrf
                  @method('delete')
                  <button class="text-red-500">Supprimer</button>
            </form>
            <a href="{{ route('admin.client.show', ['client' => $client->id]) }}">Detail</a>
        </div>

      </div>
      
</div>