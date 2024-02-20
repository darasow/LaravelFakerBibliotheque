@extends('admin.admin')
@section('title', 'Ajout client')

@section('content')

<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        
                     @if($client->exists)
                     <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-4">Modifier les information de : {{ $client->nom }}</h2>
                      <div class="flex items-center justify-center mb-2">
                       <img src="/storage/{{$client->image}}" alt="./Exemple.png" class="h-[100px] w-[200px]" srcset="">
                      </div>
                     @else
                            <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Ajouter un Client</h2>
                       @endif


        @if ($errors->any())
                         @foreach ($errors->all() as $error)
                        <div class="text-sm text-red-400 text-center mt-1">
                            {{ $error }}
                        </div>
                         @endforeach
                    @endif
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{ route($client->exists ? 'admin.client.update' : 'admin.client.store', $client)}}" method="post" enctype="multipart/form-data">
               @csrf
                @method($client->exists ? 'put' : 'post')   
            <div class="mb-5">
                    <label for="nom" class="block mb-2 font-bold text-gray-600">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{old('nom', $client->nom)}}" placeholder="Nom" class="border border-red-300 shadow p-3 w-full rounded mb-">
                    
                </div>

                <div class="mb-5">
                    <label for="prenom" class="block mb-2 font-bold text-gray-600">Prenom</label>
                    <input type="text" id="prenom" name="prenom" value="{{old('prenom', $client->prenom)}}" placeholder="Prenom" class="border border-red-300 shadow p-3 w-full rounded mb-">
                    
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 font-bold text-gray-600">Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" id="image" name="image" class="border border-red-300 shadow p-3 w-full rounded mb-">
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">
                    @if($client->exists)
                       Modifer
                       @else
                       Ajouter
                       @endif
                
                </button>
            </form>
        </div>
    </div>
</div>


@endsection