<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
          <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6"><a href="{{route('livres.show', ['livre' => $livre->id])}}" class="w-full block">Titre : {{$livre->titre}}</a></h1> 
         <p class="text-start text-xl font-thin">Date de creation : {{$livre->created_at}}</p>
         <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6"><a href="{{route('authors.show', ['author' => $livre->author_id])}}" class="w-full block">Ecrit par : {{$livre->author->nom}}</a></h1> 
         <p class="text-start text-xl font-thin">Etat : {{$livre->isEmprunter()}}</p>

      </div>
      
</div>