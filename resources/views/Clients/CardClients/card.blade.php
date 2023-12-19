<div class=" flex items-center justify-center">
      
      <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
         <p class="text-start text-xl font-thin">{{$client->created_at}}</p>
        <p class=" flex items-center justify-center">Nom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6"><a href="{{route('clients.show', ['client' => $client->id])}}" class="w-full block">{{$client->nom}}</a></h1> 
        <p class=" flex items-center justify-center">Prenom</p>
        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-6">{{$client->prenom}}</h1>
       
      </div>
      
</div>