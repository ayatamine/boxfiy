<x-filament::page>
  <div class=" h-screen w-full overflow-y-scroll">

   
    <!-- Chat Area -->
    <div class=" bg-white">
      <!-- Chat Header -->
      <div class="border-b border-gray-300 p-4">
        <h1 class="text-xl font-semibold">Ticket #{{$ticket->id}}- 
        <span class=" mx-3">{{$ticket->title}}</span>
        </h1>
      </div>
  
      <!-- Chat Messages -->
      <div class="flex flex-col h-80 p-4 space-y-4 overflow-y-auto">
       @foreach ($ticket->replies as $reply)
       @if($reply->user->is_admin == true) 
      
        <div class="flex items-start space-x-2">
          <div class="w-14 h-14 bg-gray-300 rounded-full"></div>
          <div>
            <div class="bg-gray-300 text-gray-800 p-3 rounded-lg ">
              <p class="text-sm font-semibold">Admin</p>
              <p class="text-lg">{{$reply->message}}</p>
              <p class="text-xs text-gray-600">{{$reply->created_at->diffForHumans()}}</p>
            </div>
          </div>
        </div>
        @else
        <!-- Client Reply -->
        <div class="flex items-end justify-end space-x-2">
          <div>
            <div class="bg-primary-500 text-white p-3 rounded-lg  text-right">
              <a class="underline underline-offset-2 text-sm font-semibold" href="{{route('filament.resources.users.edit',$reply->user->id)}}" target="_blank">{{$reply->user->name}}</a>
              <p class="text-lg">{{$reply->message}}</p>
              <p class="text-xs text-gray-300">{{$reply->created_at->diffForHumans()}}</p>
            </div>
          </div>
          <div class="w-8 h-8 bg-blue-500 rounded-full"></div>
        </div>
        @endif
        @endforeach
        
  
        <!-- More Messages Here -->
      </div>
  
      <!-- Chat Input with Send Button -->
      @if($record->status != 'closed')
     <form action="" wire:submit.prevent='addReply' class="pb-3">
      <div class="flex items-center p-4 border-t border-gray-300">
        <textarea wire:model.defer="message"  rows="3" style="width: 100%" class="rounded-lg bg-gray-200 text-gray-800 flex-grow border  border-gray-300 rounded-l-md py-2 px-3 focus:outline-none" placeholder="Type your message..."></textarea>
      </div>
      <div class="flex justify-end items-center gap-3 pb-3">
     
        <button wire:click='closeTicket' style="background-color: red" class=" font-semibold text-white py-2 px-4 rounded-r-md hover:bg-blue-600 focus:outline-none rounded-lg">Close Ticket</button>
        <button type="submit" class="bg-primary-500 text-white py-2 px-4 rounded-r-md hover:bg-blue-600 focus:outline-none rounded-lg">Send Reply</button>

       
      </div>
     </form>
     @else 
     <div class="flex justify-end items-center gap-3 pb-3 px-4">
        <button wire:click='openTicket' style="background-color: red" class=" font-semibold text-white py-2 px-4 rounded-r-md hover:bg-blue-600 focus:outline-none rounded-lg">Open This Ticket</button>
     </div>
     @endif
    </div>
  </div>
  
</x-filament::page>
