@extends('base')
@section('title', 'Detaille')

@section('content')

<div class="w-[80%] mx-auto">
     
<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">{{$livre->titre}}</h1>

    @include('Livres.CardLivres.card')

</div>

</div>

@endsection