<x-filament::page>
    {{-- <div class="flex justify-end">
        <button class="bg-blue-400 text-white text-sm p-0.5 px-2 rounded">Send Notification</button>
    </div> --}}
    {{-- <form wire:submit.prevent="submit">
        {{ $this->form }}
     
        <button type="submit">
            Submit
        </button>
    </form> --}}
    <div class="grid grid-cols-1 md-grid-cols-3 lg:grid-cols-3 gap-2">
        @forelse ($users as $user)
            <a href="{{route('filament.resources.users.view',$user->id)}}" target="_blank" class="bg-white flex items-center border p-4 rounded-lg shadow-md">
                <div class="flex-shrink-0 mr-4">
                <img class="h-16 w-16 rounded-full object-cover" src="{{$user->thumbnail}}" alt="{{$user->name}}">
                </div>
                <div>
                <h4 class="flex items-center gap-2 font-semibold text-base">{{$user->name}} <div class="h-3 w-3 rounded-full bg-success-500"></div></h4>
                <p class="text-gray-600 text-sm">
                   {{$user->email}}
                </p>
                </div>
            </a>
        @empty
            <span class="bg-blue-400 text-white p-2 text-base">No User Presented</span>
        @endforelse
       
          
    </div>
    {{$users->links()}}
</x-filament::page>
