@extends('admin.admin')
@section('title', 'Ajout livre')

@section('content')

<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        
                     @if($livre->exists)
                     <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-4">Modifier les information de : {{ $livre->titre }}</h2>
                      <div class="flex items-center justify-center mb-2">
                       <img src="/storage/{{$livre->image}}" alt="./Exemple.png" class="h-[100px] w-[200px]" srcset="">
                      </div>
                     @else
                            <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Ajouter un livre</h2>
                       @endif


                  @if ($errors->any())
                         @foreach ($errors->all() as $error)
                        <div class="text-sm text-red-400 text-center mt-1">
                            {{ $error }}
                        </div>
                         @endforeach
                    @endif
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{ route($livre->exists ? 'admin.livre.update' : 'admin.livre.store', $livre)}}" method="post" enctype="multipart/form-data">
               @csrf
                @method($livre->exists ? 'put' : 'post')   
            <div class="mb-5">
                    <label for="titre" class="block mb-2 font-bold text-gray-600">Titre</label>
                    <input type="text" id="titre" name="titre" value="{{old('titre', $livre->titre)}}" placeholder="titre" class="border border-red-300 shadow p-3 w-full rounded mb-">
                </div>

                <div class="mb-5">
                    <label for="author" class="block mb-2 font-bold text-gray-600">Auteur</label>
                        <select name="author_id" id="author" class="w-full">
                                   @foreach($authors as $valeur)
                                    <option @selected($valeur->id == $livre->id_author) value="{{$valeur->id}}">{{$valeur->nom}}</option>
                                   @endforeach
                        </select>
                                       
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 font-bold text-gray-600">Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" id="image" name="image" class="border border-red-300 shadow p-3 w-full rounded mb-">
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">
                    @if($livre->exists)
                       Modifer
                       @else
                       Ajouter
                       @endif
                
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script>
  new TomSelect('select[multiple]', {plugins : {remove_button : {title : 'Supprimer'}}})
</script>

@endsection