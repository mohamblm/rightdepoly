@foreach($formations ?? [] as $formation)
        
                
                    <div  class="bg-white rounded-lg shadow-md overflow-hidden" >
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <a href="{{ route('formation.show', ['id' => $formation->id]) }}">
                                    <img src="{{ asset('storage/images/' . 'formation1.png') }}" alt="{{ $formation->nom ?? 'Formation' }}" class="h-48 w-full object-cover md:h-full">
                                </a>
                            </div>
                           
                            <div class="p-6 md:w-2/3">
                                <a href="{{ route('formation.show', ['id' => $formation->id]) }}">
                                    <h3 class="text-xl font-bold mb-2">
                                        {{ $formation->nom ?? 'Best LearnPress WordPress Theme Collection For 2023' }}
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-3">
                                        {{ $formation->description ?? 'no description for this formations ...' }}
                                    </p>
                                    <div class="text-blue-400 mt-3">
                                        <i class="far fa-building mr-1"></i>
                                        <span>{{ $formation->etablissement->nom }}</span>
                                        <i class="fas fa-filter ml-5"></i>
                                        <span>{{ $formation->domaine->nom }}</span>
                                        
                                    </div>
                                </a> 
                            </div>
                        
                        </div>
                    </div> 
                 
@endforeach

{{-- <div class="mt-6">
    {{ $formations->appends(request()->query())->links() }}
</div> --}}
<!-- Pagination controls -->
{{-- <div id="pagination-controls" class="mt-6">
    <button id="prev-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md">Previous</button>
    <span id="page-info" class="mx-4">Page 1</span>
    <button id="next-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md">Next</button>
</div> --}}

