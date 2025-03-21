
@extends('admin.layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-6">All Notifications</h2>
                
                @if($notifications->count() > 0)
                    <div class="space-y-4">
                        @foreach($notifications as $notification)
                            <div class="p-4 rounded-md {{ $notification->read_at ? 'bg-white' : 'bg-blue-50' }} border">
                                <div class="flex justify-between">
                                    <h3 class="font-medium">{{ $notification->data['title'] }}</h3>
                                    <span class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mt-1 text-gray-600">{{ $notification->data['message'] }}</p>
                                
                                @if(!$notification->read_at)
                                    <form method="POST" action="{{ url('notifications/'.$notification->id.'/mark-as-read') }}" class="mt-2">
                                        @csrf
                                        <button type="submit" class="text-xs text-blue-600 hover:underline">
                                            Mark as read
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                @else
                    <p class="text-gray-500">You don't have any notifications yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection