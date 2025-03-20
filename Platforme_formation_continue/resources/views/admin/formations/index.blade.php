@extends('admin.layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des formations') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <div class="flex justify-between items-center mb-2"> 
                <h1 class="font-bold text-2xl"> Formations</h1>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out" id="show-add-modal">
                    Add New Formation
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filtres -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('admin.formations.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Recherche</label>
                                <input type="text" name="search" id="search" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12" placeholder="Nom de la formation..." value="{{ request('search') }}">
                            </div>
                            
                            <div>
                                <label for="domaine" class=" block text-sm font-medium text-gray-700">Domaine</label>
                                <select name="domaine" id="domaine" class="select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    @foreach($domaines as $domaine)
                                        <option value="{{ $domaine->id }}" {{ request('domaine') == $domaine->id ? 'selected' : '' }}>{{ $domaine->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="etablissement" class="select block text-sm font-medium text-gray-700">Établissement</label>
                                <select name="etablissement" id="etablissement" class=" select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    @foreach($etablissements as $etablissement)
                                        <option value="{{ $etablissement->id }}" {{ request('etablissement') == $etablissement->id ? 'selected' : '' }}>{{ $etablissement->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="flex items-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Filtrer
                                </button>
                                <a href="{{ route('admin.formations.index') }}" class="ml-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                    Réinitialiser
                                </a>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Tableau des formations -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Formation</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Établissement</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Domaine</th>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th> --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="formations-table-body">
                                @forelse($formations as $formation)
                                <tr class="hover:bg-gray-50" data-formation-id="{{ $formation->id }}">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-20 w-20 overflow-hidden bg-gray-100">
                                                <img src="{{ asset('storage/'.$formation->image) }}" 
                                                     alt="{{ $formation->nom }}" 
                                                     class="formation-image h-full w-full object-cover">
                                            </div>
                                            <div class="ml-4">
                                                <div class="formation-name text-sm font-medium text-gray-900">
                                                    {{ $formation->nom }}
                                                </div>
                                                <div class="trend-container text-sm text-gray-500">
                                                    @if($formation->trend)
                                                        <span class="formation-trend inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800">
                                                            Trending
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="formation-etablissement text-sm text-gray-900">
                                            {{ $formation->etablissement->nom }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="formation-domaine text-sm text-gray-900">
                                            {{ $formation->domaine->nom }}
                                        </div>
                                    </td>
                                
                                    {{-- <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 max-w-xs ">{{ $formation->description }}</div>
                                    </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button 
                                            type="button" 
                                            class="text-yellow-600 hover:text-yellow-900 inline-flex items-center" 
                                            onclick="openUpdateModal({{ $formation->id }})"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </button>
                                        
                                        
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                            type="submit" 
                                            class="text-red-600 hover:text-red-900 inline-flex items-center" 
                                            onclick="confirmDelete({{ $formation->id }})"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                       
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center">
                                        <div class="py-8 text-center" id="empty-state">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">No formations found</h3>
                                            <p class="mt-1 text-sm text-gray-500">Try clearing your filters or search terms.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $formations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de confirmation de suppression -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Confirmation de suppression</h3>
            </div>
            <div class="px-6 py-4">
                <p class="text-sm text-gray-500">
                    Êtes-vous sûr de vouloir supprimer cet formation ? Cette action est irréversible.
                </p>
            </div>
            <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                    Annuler
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
    
     {{-- notifiation --}}
     @if (session('success') )
     <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed top-4 right-4 z-50 max-w-sm w-full">
         
         <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
             <!-- Checkmark icon with animated circle -->
             <div class="flex-shrink-0 relative">
                 <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                     <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                     </svg>
                 </div>
                 <svg class="w-8 h-8 absolute top-0 left-0 text-green-500 animate-[spin_4s_ease-in-out_infinite]" viewBox="0 0 24 24" fill="none">
                     <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1" stroke-dasharray="1 3" />
                 </svg>
             </div>
             
             <!-- Message with title and content -->
             <div class="ml-4 flex-1">
                 
                     <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                     <p class="text-sm text-gray-600">
                         {{session('success')}}
                     </p>
             </div>
         </div>
     </div>
 @endif
@include('admin.formations.create')
@include('admin.formations.edit')
    <!-- Scripts pour le filtrage automatique -->
    <script>
        // Fonctions pour le modal de suppression
        function confirmDelete(formationId) {
            document.getElementById('deleteForm').action = `/dashboardformations/${formationId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
        // Fonction de debounce pour le champ de recherche
        let debounceTimer;
        const searchInput = document.getElementById('search');
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                this.form.submit();
            }, 500);
        });

        // Soumission automatique lors du changement des listes déroulantes
        document.querySelectorAll('.select').forEach(select => {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        });
        
        
        document.getElementById('show-add-modal').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('add-formation-modal').classList.remove('hidden');
});


    </script>
@endsection
