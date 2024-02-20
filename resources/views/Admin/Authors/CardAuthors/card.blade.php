<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
         <img src="/storage/{{$author->image}}" alt="./Exemple.png" class="h-[100px] w-full" srcset="">
        <p class=" flex items-center justify-center">Nom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6">{{$author->nom}}</h1> 
        <p class=" flex items-center justify-center">Prenom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6">{{$author->prenom}}</h1>
        <div class="flex items-center justify-around ">
            <a href="{{ route('admin.author.edit', ['author' => $author->id]) }}">Modifier</a>
            <form method="post" action="{{ route('admin.author.destroy', $author) }}" class="inline">
                  @csrf
                  @method('delete')
                  <button class="text-red-500">Supprimer</button>
            </form>
            <a href="{{ route('admin.author.show', ['author' => $author->id]) }}">Detail</a>
        </div>

      </div>
      
</div>