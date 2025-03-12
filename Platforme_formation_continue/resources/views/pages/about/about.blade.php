@extends('layouts.app')

@section('title', 'À Propos de Nous')

@section('content')
    {{-- Import the hero section partial --}}
    @include('pages.about.partials.hero')
    
    {{-- Rest of the about page content goes here --}}
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div id="notre-histoire">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Notre Histoire</h2>
                <p class="text-gray-600 mb-4">
                    Fondée en 2020, notre entreprise a commencé avec une vision simple : rendre la technologie accessible à tous. Depuis, nous avons grandi pour devenir un leader dans notre domaine.
                </p>
                <p class="text-gray-600">
                    Nous nous efforçons chaque jour d'innover et d'améliorer nos services pour mieux répondre à vos besoins.
                </p>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Nos Valeurs</h2>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Innovation constante</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Qualité exceptionnelle</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Satisfaction client</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection