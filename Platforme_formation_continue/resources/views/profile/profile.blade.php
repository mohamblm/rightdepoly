@extends('layouts.app')

@section('content')
<div class=" p-0">
    <!-- Top section with blue background and profile info is included here -->
    @include('profile.partials.topSection')

    <!-- Content Area -->
    <div class="container p-20">
        <!-- Dynamic Section -->
        <div class="card p-4">
            @if ($section == 'messages')
                <h4 class="text-primary">Messages</h4>
                <p>Manage your profile settings here.</p>
            @elseif ($section == 'historique')
                <h4 class="text-primary"> historique</h4>
                <p>View your enrolled courses.</p>
            @elseif ($section == 'edite')
                @include('profile.partials.edit')
            @endif
        </div>
    </div>
</div>
@endsection