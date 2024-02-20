@extends('admin.admin')
@section('title', 'Liste des Auteurs')

@section('content')

<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        
                     @if($author->exists)
                     <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-4">Modifier les information de : {{ $author->nom }}</h2>
                      <div class="flex items-center justify-center mb-2">
                       <img src="/storage/{{$author->image}}" alt="./Exemple.png" class="h-[100px] w-[200px]" srcset="">
                      </div>
                     @else
                            <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Ajouter un Auteur</h2>
                       @endif


        @if ($errors->any())
                         @foreach ($errors->all() as $error)
                        <div class="text-sm text-red-400 text-center mt-1">
                            {{ $error }}
                        </div>
                         @endforeach
                    @endif
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{ route($author->exists ? 'admin.author.update' : 'admin.author.store', $author)}}" method="post" enctype="multipart/form-data">
               @csrf
                @method($author->exists ? 'put' : 'post')   
            <div class="mb-5">
                    <label for="nom" class="block mb-2 font-bold text-gray-600">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{old('nom', $author->nom)}}" placeholder="Nom" class="border border-red-300 shadow p-3 w-full rounded mb-">
                    
                </div>

                <div class="mb-5">
                    <label for="prenom" class="block mb-2 font-bold text-gray-600">Prenom</label>
                    <input type="text" id="prenom" name="prenom" value="{{old('prenom', $author->prenom)}}" placeholder="Prenom" class="border border-red-300 shadow p-3 w-full rounded mb-">
                    
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 font-bold text-gray-600">Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" id="image" name="image" class="border border-red-300 shadow p-3 w-full rounded mb-">
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">
                    @if($author->exists)
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