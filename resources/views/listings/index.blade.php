<x-layout>

    @include('partials._hero')  
    @include('partials._search')
    
    <!-- without blade -->
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">    
            
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
        
</x-layout>
        