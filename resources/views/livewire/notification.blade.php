<div class="container mx-auto p-6 py-10">
    <h1 class="h3  font-semibold text-mainBg mb-4 flex justify-between items-center">
       <span> Notifications List</span>
        <a href="{{route('notification.mark-as-readAll')}}" class="flex gap-2 items-center text-lg bg-green-500 hover:bg-green-700 hover:text-white cursor-pointer text-white font-bold py-2 px-3 rounded">
            <svg class="h-5 w-5"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 12l5 5l10 -10" />  <path d="M2 12l5 5m5 -5l5 -5" /></svg>
            <span>Mark All as Read</span>
        </a>
    </h1>
    <div class="grid grid-cols-1 gap-3 my-6">
      @forelse ($notifications as $notification)
      <div class="bg-white @if($notification->read_at) opacity-75 @endif shadow p-4 py-2 flex items-center justify-between">
        <div class="flex items-center">
          {{-- <div class="rounded-full h-8 w-8 bg-gray-300"></div> --}}
          <div class="ml-4">
            {{-- <p class="font-bold">{{$notification->type}}</p> --}}
            <p class="text-gray-500 h4 leading-7">
                {{$notification->data['title']}}
              
                @switch($notification->type)
                    @case('App\Notifications\User\NewTicketReplyNotification')
                            @php
                            $query = ['ticket'=>$notification->data['ticket_id'] ?? $notification->data['id']];
                            if($notification->read_at ==null){
                            $query['notification_id']= $notification->id ;
                            }
                            @endphp
                            <a class="block mt-2 text-blue-600 underline underline-offset-2" href="{{route('tickets.show',$query)}}" class="mx-3">View Ticket</a>
                        @break
                    @case('App\Notifications\User\BalanceCreditedNotification')
                    <a class="block mt-2 text-blue-600 underline underline-offset-2" href="{{route('wallet',['notification_id'=>$notification->id])}}" class="mx-3">View Balance</a>
                        @break
                    @default
                    <a class="block mt-2 text-blue-600 underline underline-offset-2" href="#" class="mx-3">View</a>
 
                @endswitch
            </p>
          </div>
        </div>
      {{-- @if(!$notification->read_at)
      <a wire:click="markSingleNotificationsAsRead($notification->id)"  class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
        Mark as Read
      </a>
      @endif --}}
      </div>
      @empty
      <div class="bg-white  shadow p-4 py-2 flex items-center justify-between">
        <div class="flex items-center">
          {{-- <div class="rounded-full h-8 w-8 bg-gray-300"></div> --}}
          <div class="ml-4">
            no notification found
          </div>
        </div>
      </div>
      @endforelse
     
      <!-- Add more notifications with buttons -->
    </div>
</div>

