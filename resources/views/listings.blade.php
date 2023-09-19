@extends('layout')

@section('content')
@include('partials._hero')  
@include('partials._search')

<!-- <h1><?php echo $heading; ?></h1> -->
<!-- without blade -->
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">    <!-- using blade -->
<!-- @if(count($listings) == 0)
    <p>No listings found</p>
@endif -->

    @unless(count($listings) == 0)
    <!-- unless aconteça isso -->
    @foreach ($listings as $listing)
        <x-listing-card :listing="$listing" />
    @endforeach

    @else
        <p>No listing found</p>
        <!-- acontece isso -->
    @endunless

</div>

@endsection
