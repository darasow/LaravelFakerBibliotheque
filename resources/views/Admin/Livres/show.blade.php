@extends('admin.admin')
@section('title', 'Liste des Livres')
@section('content')

<div class="w-[80%] mx-auto">
     
<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">{{$livre->titre}}</h1>

    @include('Admin.Livres.CardLivres.card')
</div>

</div>

@endsection