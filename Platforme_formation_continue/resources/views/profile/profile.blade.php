@extends('layouts.app')

@section('content')
<div class="pt-30">
@include('profile.partials.topSection')
<div class="container mb-40 mt-40">
    <div class="row">
        <!-- Sidebar -->
        <div class="list-group">
    <a href="{{ route('profile.section', 'settings') }}" class="list-group-item 
        {{ request()->is('profile/settings') ? 'active' : '' }}">
        Settings
    </a>
    <a href="{{ route('profile.section', 'courses') }}" class="list-group-item 
        {{ request()->is('profile/courses') ? 'active' : '' }}">
        Courses
    </a>
    <a href="{{ route('profile.section', 'messages') }}" class="list-group-item 
        {{ request()->is('profile/messages') ? 'active' : '' }}">
        Messages
    </a>
</div>
        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="card p-4">
                    <!-- Dynamic Section -->
                @if ($section == 'settings')
                    <p>hhfhf</p>
                @elseif ($section == 'courses')
                @include('profile.partials.topSection')
                @elseif ($section == 'messages')
                    @include('profile.partials.edit')
            
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
