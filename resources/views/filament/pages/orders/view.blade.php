<x-filament::page>
    <style>
        .processing {
    color: #f0b758;
    background-color: #f0b75873;
}

.completed {
    color: #1ec762;
    background-color: #1ec76257;
}

.canceled {
    color: #fd5350;
    background-color: #fd53504d;
}

 .Partially,.partial {
    color: #c8df63;
    background-color: #c8df6359;
}
 .pending {
    color: #1444c6;
    background-color: #56bade;

}
    </style>
    <div class="bg-white  rounded-lg shadow-md p-6">
        <div class="mb-4">
            <h2 class="text-xl font-semibold p-2 bg-gray-200 border mb-3">Order ID: #{{$record->id}} <span class="mx-3">{{$record->service->name}}</span></h2>
            <div class="flex gap-2  mb-2"><span class="font-semibold">Date:</span> 
                <span>{{date('d,M Y',strtotime($record->created_at))}}</span>
            </div>
        </div>
      
        
        <div class="mb-4">
            <h3 class="text-lg font-semibold underline underline-offset-2 p-2 bg-gray-200 border mb-3">Client Informations</h3>
             <div class="flex gap-2  mb-2"><span class="font-semibold">Name:</span> <span>{{$record->user->name}}</span></div>
             <div class="flex gap-2  mb-2"><span class="font-semibold">Email:</span> <span>{{$record->user->email}}</span></div>
            <a class="underline underline-offset-2 text-primary-600" href="{{route('filament.resources.users.view',$record->user->id)}}" target="_blank">View Client
                {{-- <x-icons.eye/> --}}
            </a>
        </div>
        @if(isset($order_status))
        <div class="mb-4">
            <h3 class="text-lg font-semibold underline underline-offset-2 p-2 bg-gray-200 border mb-3">Api Informations</h3>
            <div class="flex gap-2  mb-2"><span class="font-semibold">Api provider:</span> <span>{{$record->service->api->name}}</span></div>
            <div class="flex gap-2  mb-2"><span class="font-semibold">Order Number:</span> 
                <span>{{$record->order_number}}</span>
            </div>
        </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3  ">
            <div>
                <h3 class="text-lg font-semibold  underline underline-offset-2 p-2 bg-gray-200 border mb-3">Order Details</h3>
                <!-- Loop through and display order items -->
                <div class="  mb-2">
                    <div class="flex gap-2 mb-2"><span class="font-semibold">Link:</span> <a  class="underline underline-offset-2 text-primary-600" target="_blank" href="{{$record->link}}">{{$record->link}}</a></div>
                    <div class="flex gap-2 mb-2"><span class="font-semibold">Amount:</span> <span>{{$record->amount}}</span></div>
                    <div class="flex gap-2 mb-2"><span class="font-semibold">Price:</span> <span>{{$record->price}}$</span></div>
                    @if(!isset($order_status))
                    <div div class="flex gap-2 mb-2"><span class="font-semibold">Status:</span> 
                        <span 
                        @class([$record->status,'p-1 px-2 rounded'])
                        >{{$record->status}}</span>
                    </div>
                    @endif
                    <div class="flex gap-2 mb-2"><span class="font-semibold">Last Update:</span> 
                        <span>{{date('d,M Y',strtotime($record->updated_at))}}</span>
                    </div>
                    @if(isset($order_status))
                    @foreach ($order_status as $key=>$item)
                    <div class="flex gap-2  mb-2">
                        <span class="font-semibold">{{$key}}</span> 
                        <span  @class([$key =='status' =>\Illuminate\Support\Str::lower($item),'p-1 px-2 rounded'])>{{$item}}</span>
                    </div>
                    @endforeach
                    @endif
                   
                </div>
                <!-- Add more order items as needed -->
            </div>
            <div>
                <h3 class="text-lg font-semibold  underline underline-offset-2 p-2 bg-gray-200 border mb-3">Service Details</h3>
                <!-- Loop through and display order items -->
                <div class="  mb-2">
                    <div class="flex gap-2  mb-2"><span class="font-semibold">Name:</span> <span>{{$record->service->name}}</span></div>
                    <div class="flex gap-2  mb-2"><span class="font-semibold">Category:</span> <span>{{$record->service->category->name}}</span></div>
                    <div class="flex gap-2  mb-2"><span class="font-semibold">Price:</span> 
                        <span>{{$record->service->price}}$</span>
                    </div>
                    <div class="flex gap-2  mb-2"><span class="font-semibold">Rate(ex="1$ per 1000 view"):</span> 
                        <span>{{$record->service->rate}}</span>
                    </div>
                    
                </div>
                <!-- Add more order items as needed -->
            </div>
        </div>
    </div>
</x-filament::page>