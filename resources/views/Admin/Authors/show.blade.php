@extends('admin.admin')

@section('title', 'Liste des Auteurs')

@section('content')
<div class="w-[80%] mx-auto">
     
<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">{{$author->nom}}</h1>

    @include('Admin.Authors.CardAuthors.card')

   <div class="grid grid-cols-1 items-center gap-2  md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 space-y-2 md:space-y-0 md:space-x-2">
         @if($livres)
         <p class="col-span-4 text-center bg-blue-500 text-white p-2 text-lg font-bold">La liste des livres que j'ai Ecrit</p>
         @endif
         
         @forelse($livres as $livre)
        <div class=" flex items-center justify-center">
      
                    <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[400px] ">
                        <p class="text-start text-xl font-thin">{{$livre->created_at}}</p>
                        <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-2 mb-2"><a href="{{ route('admin.livre.show', ['livre' => $livre->id]) }}" class="w-full block">Titre : <br>{{$livre->titre}}</a></h1> 
                     
                    </div>
      
       </div>
         @empty
          
            <h1 class="flex mt-4 items-center justify-center py-4 bg-blue-500 text-bold text-white">Je n'es aucun livre</h1>

        @endforelse
                        

               
   </div>
             



</div>

</div>

@endsection