<!-- Modifier la Modal de Formation -->
<div id="edit-formation-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-4xl rounded-lg bg-white shadow-xl transition-all">
            <!-- En-tête Modal -->
            <div class="flex items-center justify-between rounded-t-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                <h3 class="text-xl font-medium text-white">Modifier la Formation</h3>
                <button type="button" id="close-edit-modal" class="rounded-md bg-transparent text-white hover:bg-white hover:bg-opacity-20 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Corps Modal -->
            <div class="max-h-[calc(100vh-200px)] overflow-y-auto p-6">
                <form  id="edit-formation-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-formation-id" name="formation_id">
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Informations de Base -->
                        <div class="space-y-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Informations de Base</h4>
                            
                            <div>
                                <label for="edit-nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom" id="edit-nom" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="edit-etablissement_id" class="block text-sm font-medium text-gray-700">Établissement</label>
                                    <select name="etablissement_id" id="edit-etablissement_id" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                        <option value="">Sélectionner un établissement</option>
                                        @foreach($etablissements as $etablissement)
                                            <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="edit-domaine_id" class="block text-sm font-medium text-gray-700">Domaine</label>
                                    <select name="domaine_id" id="edit-domaine_id" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                        <option value="">Sélectionner un domaine</option>
                                        @foreach($domaines as $domaine)
                                            <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <label for="edit-description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="edit-description" rows="4" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                            </div>
                            
                            <div>
                                <label for="edit-image" class="block text-sm font-medium text-gray-700">Image</label>
                                <div class="mt-1 flex items-center">
                                    <div id="edit-image-preview" class="relative h-32 w-32 overflow-hidden rounded-md border-2 border-dashed border-gray-300 bg-gray-100">
                                        <div class="flex h-full w-full items-center justify-center">
                                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <img id="edit-preview-image" class="absolute inset-0 h-full w-full object-cover" alt="Aperçu">
                                    </div>
                                    <label for="edit-image-upload" class="ml-5 cursor-pointer rounded-md bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Changer l'Image
                                    </label>
                                    <input id="edit-image-upload" name="image" type="file" accept="image/*" class="hidden" onchange="previewEditImage(this)">
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" name="trend" id="edit-trend" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <label for="edit-trend" class="ml-2 block text-sm text-gray-700">Marquer comme tendance</label>
                            </div>
                        </div>
                        
                        <!-- Section Sous-Titres -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                            <h4 class="text-lg font-medium text-gray-700">Sous-Titres</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-sub-title-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un sous-titre">
                                <button type="button" id="edit-add-sub-title" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-sub-titles-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les sous-titres seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="sub_titles" id="edit-sub-titles-json">
                        </div>
                        
                        <!-- Section Prérequis -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                            <h4 class="text-lg font-medium text-gray-700">Prérequis</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-requirement-input" class=" p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un prérequis">
                                <button type="button" id="edit-add-requirement" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-requirements-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les prérequis seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="requirements" id="edit-requirements-json">
                        </div>
                        
                        <!-- Section Inclus -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Ce qui est inclus</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-include-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter ce qui est inclus">
                                <button type="button" id="edit-add-include" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-includes-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les éléments inclus seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="includes" id="edit-includes-json">
                        </div>
                        
                        <!-- Section Langues (Optionnelle) -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Langues</h4>
                            
                            <div class="flex flex-wrap gap-2">
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="French" id="edit-lang-french" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-fr" class="ml-2 text-sm text-gray-700">Français</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="English" id="edit-lang-english" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-en" class="ml-2 text-sm text-gray-700">Anglais</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="Arabic" id="edit-lang-arabic" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-ar" class="ml-2 text-sm text-gray-700">Arabe</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="Spanish" id="edit-lang-spanish" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-es" class="ml-2 text-sm text-gray-700">Espagnol</label>
                                </div>
                                <!-- Ajouter d'autres langues si nécessaire -->
                            </div>
                        </div>
                        
                        <!-- Section Pour Qui -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">À qui s'adresse cette formation ?</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-for-who-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un public cible">
                                <button type="button" id="edit-add-for-who" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-for-whos-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les entrées "pour qui" seront ajoutées ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="for_whos" id="edit-for-whos-json">
                        </div>
                    </div>
                    
                    <!-- Boutons de Soumission -->
                    <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-5">
                        <button type="button" id="cancel-edit-formation" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="mr-2 -ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mettre à jour la Formation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
   

    // DOM Elements
    const editFormationModal = document.getElementById('edit-formation-modal');
    const editFormationForm = document.getElementById('edit-formation-form');
    const closeEditModalBtn = document.getElementById('close-edit-modal');
    const cancelEditFormationBtn = document.getElementById('cancel-edit-formation');
    
    // List management variables
    let editSubTitles = [];
    let editRequirements = [];
    let editIncludes = [];
    let editForWhos = [];
    

    // Reset all edit lists
    function resetEditLists() {
        editSubTitles = [];
        editRequirements = [];
        editIncludes = [];
        editForWhos = [];
        
        document.getElementById('edit-sub-titles-list').innerHTML = '';
        document.getElementById('edit-requirements-list').innerHTML = '';
        document.getElementById('edit-includes-list').innerHTML = '';
        document.getElementById('edit-for-whos-list').innerHTML = '';
    }

    // Show modal function
    function openUpdateModal(formationId) {
        // Show the modal
        editFormationModal.classList.remove('hidden');
        
        // Fetch formation data by ID
        fetch(`/dashboardformations/${formationId}`)
            .then(response => response.json())
            .then(formation => {
                // Populate the form with formation data
                populateEditForm(formation);
            })
            .catch(error => {
                console.error('Error fetching formation:', error);
                alert('Failed to load formation data');
            });
    };
    
    // Populate form with formation data
    function populateEditForm(formation) {
        // Set formation ID
        document.getElementById('edit-formation-id').value = formation.id;
        
        // Basic information
        document.getElementById('edit-nom').value = formation.nom;
        document.getElementById('edit-etablissement_id').value = formation.etablissement_id;
        document.getElementById('edit-domaine_id').value = formation.domaine_id;
        document.getElementById('edit-description').value = formation.description;
        document.getElementById('edit-trend').checked = formation.trend;
        
        // Preview image if exists
        if (formation.image) {
            const previewImage = document.getElementById('edit-preview-image');
            previewImage.src = `/storage/${formation.image}`;
            previewImage.style.display = 'block';
        }
        
        // Reset and populate dynamic lists
        resetEditLists();
        
        // Populate sub titles
        if (formation.sub_titles) {
            try {
                editSubTitles = JSON.parse(formation.sub_titles);
                refreshEditSubTitlesList();
            } catch (e) {
                console.error('Error parsing sub titles:', e);
            }
        }
        
        // Populate requirements
        if (formation.requirements) {
            try {
                editRequirements = JSON.parse(formation.requirements);
                refreshEditRequirementsList();
            } catch (e) {
                console.error('Error parsing requirements:', e);
            }
        }
        
        // Populate includes
        if (formation.includes) {
            try {
                editIncludes = JSON.parse(formation.includes);
                refreshEditIncludesList();
            } catch (e) {
                console.error('Error parsing includes:', e);
            }
        }
        
        // Populate for whos
        if (formation.for_whos) {
            try {
                editForWhos = JSON.parse(formation.for_whos);
                refreshEditForWhosList();
            } catch (e) {
                console.error('Error parsing for_whos:', e);
            }
        }
        
        // Populate languages
        if (formation.languages) {
            try {
                let languages = [];
                if (Array.isArray(formation.languages)) {
                    languages = formation.languages;
                } else if (typeof formation.languages === "string") {
                    languages = JSON.parse(formation.languages || '[]');
                }

                // Clear all checkboxes first
                document.querySelectorAll('input[name="languages[]"]').forEach(checkbox => {
                    checkbox.checked = false;
                });

                // Check the appropriate language checkboxes
                languages.forEach(lang => {
                    const checkbox = document.getElementById(`edit-lang-${lang.toLowerCase()}`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            } catch (e) {
                console.error("Error parsing languages:", e);
            }
        }
    }
    
    
    
    
    
    // Sub Titles List Management
    document.getElementById('edit-add-sub-title').addEventListener('click', function() {
        const input = document.getElementById('edit-sub-title-input');
        const value = input.value.trim();
        
        if (value) {
            editSubTitles.push(value);
            input.value = '';
            refreshEditSubTitlesList();
            document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
        }
    });
    
    function refreshEditSubTitlesList() {
        const list = document.getElementById('edit-sub-titles-list');
        list.innerHTML = '';
        
        editSubTitles.forEach((title, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${title}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editSubTitles.splice(index, 1);
                refreshEditSubTitlesList();
                document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
    }
    
    // Requirements List Management
    document.getElementById('edit-add-requirement').addEventListener('click', function() {
        const input = document.getElementById('edit-requirement-input');
        const value = input.value.trim();
        
        if (value) {
            editRequirements.push(value);
            input.value = '';
            refreshEditRequirementsList();
        }
    });
    
    function refreshEditRequirementsList() {
        const list = document.getElementById('edit-requirements-list');
        list.innerHTML = '';
        
        editRequirements.forEach((requirement, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${requirement}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editRequirements.splice(index, 1);
                refreshEditRequirementsList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-requirements-json').value = JSON.stringify(editRequirements);
    }
    
    // Includes List Management
    document.getElementById('edit-add-include').addEventListener('click', function() {
        const input = document.getElementById('edit-include-input');
        const value = input.value.trim();
        
        if (value) {
            editIncludes.push(value);
            input.value = '';
            refreshEditIncludesList();
        }
    });
    
    function refreshEditIncludesList() {
        const list = document.getElementById('edit-includes-list');
        list.innerHTML = '';
        
        editIncludes.forEach((include, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${include}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editIncludes.splice(index, 1);
                refreshEditIncludesList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-includes-json').value = JSON.stringify(editIncludes);
    }
    
    // For Who List Management
    document.getElementById('edit-add-for-who').addEventListener('click', function() {
        const input = document.getElementById('edit-for-who-input');
        const value = input.value.trim();
        
        if (value) {
            editForWhos.push(value);
            input.value = '';
            refreshEditForWhosList();
        }
    });
    
    function refreshEditForWhosList() {
        const list = document.getElementById('edit-for-whos-list');
        list.innerHTML = '';
        
        editForWhos.forEach((forWho, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${forWho}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editForWhos.splice(index, 1);
                refreshEditForWhosList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-for-whos-json').value = JSON.stringify(editForWhos);
    }
    
    // Image preview functionality
    window.previewEditImage = function(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewImage = document.getElementById('edit-preview-image');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    };
    
    // Close modal events
    closeEditModalBtn.addEventListener('click', closeEditModal);
    cancelEditFormationBtn.addEventListener('click', closeEditModal);
    
    function closeEditModal() {
        editFormationModal.classList.add('hidden');
        editFormationForm.reset();
        resetEditLists();
        document.getElementById('edit-preview-image').style.display = 'none';
    }
    
    // Form submission
    editFormationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formationId = document.getElementById('edit-formation-id').value;
        const formData = new FormData(this);
        
        // Make AJAX request to update formation
        fetch(`/dashboardformations/${formationId}`, {
            method: 'POST', // Laravel uses POST with _method=PUT
            body: formData,
            // headers: {
            //     'Content-Type': 'application/json'
            //     // 'X-Requested-With': 'XMLHttpRequest'
            // }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                handleUpdateSuccess(data.formation);
                showSuccessNotification(data.message)
            } else {
                alert(data.message || 'Failed to update formation');
            }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the formation');
            });
    });
    
    // Add keyboard event listener to close modal on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !editFormationModal.classList.contains('hidden')) {
            closeEditModal();
        }
    });
    
    // Prevent clicks inside the modal from closing it
    const modalContent = editFormationModal.querySelector('.bg-white');
    modalContent.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    
    // Close modal when clicking outside of it
    editFormationModal.addEventListener('click', function(e) {
        if (e.target === editFormationModal || e.target === editFormationModal.querySelector('.fixed.inset-0.bg-gray-900')) {
            closeEditModal();
        }
    });



    
    // Function to handle successful form submission in the edit modal
    function handleUpdateSuccess(updatedFormation) {
        // Find the table row for this formation by ID
        const tableRow = document.querySelector(`#formations-table-body tr[data-formation-id="${updatedFormation.id}"]`);
        
        if (tableRow) {
            // Update formation name
            const nameElement = tableRow.querySelector('.formation-name');
            if (nameElement) nameElement.textContent = updatedFormation.nom;

            // Update formation image
            const imageElement = tableRow.querySelector('.formation-image');
            if (imageElement && updatedFormation.image) {
                imageElement.src = `/storage/${updatedFormation.image}`;
            }

            // Update établissement name
            const etablissementElement = tableRow.querySelector('.formation-etablissement');
            console.log(etablissementElement, updatedFormation.etablissement?.nom)
            if (etablissementElement) {
                etablissementElement.textContent = updatedFormation.etablissement?.nom || 'N/A';
            }

            // Update domaine name
            const domaineElement = tableRow.querySelector('.formation-domaine');
            if (domaineElement) {
                domaineElement.textContent = updatedFormation.domaine?.nom || 'N/A';
            }

            // Update trending badge
            const trendingContainer = tableRow.querySelector('.trend-container');
            const existingBadge = tableRow.querySelector('.formation-trend');

            if (updatedFormation.trend) {
                if (!existingBadge) {
                    const newBadge = document.createElement('span');
                    newBadge.className = "formation-trend inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800";
                    newBadge.textContent = "Trending";
                    trendingContainer.appendChild(newBadge);
                }
            } else {
                if (existingBadge) {
                    existingBadge.remove();
                }
            }
        }

        // Close the modal
        closeEditModal();

    }


    // show notification function
    function showSuccessNotification(message) {
        // Remove existing notifications (if any)
        document.querySelectorAll('.success-notification').forEach(el => el.remove());

        // Create notification HTML
        const notification = document.createElement('div');
        notification.innerHTML = `
            <div x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="fixed top-4 right-4 z-50 max-w-sm w-full success-notification">
                
                <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
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
                    
                    <div class="ml-4 flex-1">
                        <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                        <p class="text-sm text-gray-600">${message}</p>
                    </div>
                </div>
            </div>
        `;

        // Append to the body
        document.body.appendChild(notification);

        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }

</script>
