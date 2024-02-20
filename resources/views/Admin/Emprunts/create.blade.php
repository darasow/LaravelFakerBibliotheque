@extends('admin.admin')
@section('title', 'Emprunter un livre')
@section('content')


<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
                     
                     <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Faire un emprunt</h2>

                  @if ($errors->any())
                         @foreach ($errors->all() as $error)
                        <div class="text-sm text-red-400 text-center mt-1">
                            {{ $error }}
                        </div>
                         @endforeach
                    @endif
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{ route($emprunt->exists ? 'admin.emprunt.update' : 'admin.emprunt.store', $emprunt)}}" method="post" enctype="multipart/form-data">
               @csrf
                @method($emprunt->exists ? 'put' : 'post')   
        
                <div class="mb-5">
                    <label for="client" class="block mb-2 font-bold text-gray-600">Client</label>
                        <select name="client_id" id="client" class="w-full">
                                   @foreach($clients as $valeur)
                                    <option @selected($valeur->id == $emprunt->id_client) value="{{$valeur->id}}">{{$valeur->nom}}</option>
                                   @endforeach
                        </select>
                                       
                </div>

                <div class="mb-5">
                    <label for="author" class="block mb-2 font-bold text-gray-600">Auteur</label>
                        <select name="livre_id" id="livre" class="w-full">
                                   @foreach($livres as $valeur)
                                    <option @selected($valeur->id == $emprunt->id_livre) value="{{$valeur->id}}">{{$valeur->titre}}</option>
                                   @endforeach
                        </select>
                                       
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">
                    @if($emprunt->exists)
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