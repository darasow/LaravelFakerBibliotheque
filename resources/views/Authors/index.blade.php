@extends('base')
@section('title', 'Liste des Auteurs')

@section('content')

<div class="w-[80%] mx-auto">
     
<h1 class="col-span-4 text-center bg-blue-500 text-white p-2 text-lg font-bold">@yield('title')</h1>
<div class="my-4 flex justify-center items-center">
                <nav class="relative z-0 inline-flex shadow-sm">
                    {{-- Styles pour les liens de pagination --}}

                    <a href="{{ $authors->previousPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-l-md hover:text-gray-500 hover:bg-gray-200 {{ $authors->onFirstPage() ? 'pointer-events-none' : '' }}" aria-label="Précédent">
                        Précédent
                    </a>

                    <a href="{{ $authors->nextPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-r-md hover:text-gray-500 hover:bg-gray-200 {{ !$authors->hasMorePages() ? 'pointer-events-none' : '' }}" aria-label="Suivant">
                        Suivant
                    </a>
                </nav>
            </div>
   <div class="grid grid-cols-1 items-center gap-2  md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 space-y-2 md:space-y-0 md:space-x-2">
        @forelse($authors as $author)
            @include('Authors.CardAuthors.card')
         @empty
          
            <h1 class="flex mt-4 items-center justify-center py-4 bg-blue-500 text-bold text-white">Aucun auteur</h1>

        @endforelse
                        

               
   </div>
             



</div>

@endsection