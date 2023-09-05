<div>
    @if(count($tickets))
<table class="border-separate border-spacing-y-4 bg-none table-auto w-full text-2xl mt-8">
  <thead class="h-[50px] ">
    <tr class="bg-[#21242cff] text-white rounded-xl p-4 py-10 text-5xl border-0">
      <th class=" font-bold p-4 pl-8  text-left">Order Num</th>
      <th class=" font-bold p-4  text-left">Ticket Name</th>
      <th class=" font-bold p-4 pr-8  text-left">Date </th>
      <th class=" font-bold p-4 pr-8  text-left">Status </th>
    </tr>
  </thead>
  <tbody class="bg-none ">
    @foreach ($tickets as $ticket)

    <tr class="bg-[#21242cff] text-white rounded-xl p-4 py-8 text-4xl border-0 mb-3">
      <td class=" font-bold p-4 pl-8  text-left">{{$ticket->order_id ?? '/'}}</td>
      <td class=" font-bold p-4 pl-8 ">
        <a href="{{route('tickets.show',[$ticket->id])}}">{{$ticket->title}}</a>
      </td>
      <td class=" font-bold p-4 pl-8 ">{{date('d-M-Y',strtotime($ticket->created_at))}}</td>
      <td class=" font-bold p-4 pl-8 ">
        @switch($ticket->status)
            @case('pending')
            <span class="bg-blue-200 text-blue-800 font-bold text-lg p-4 px-8">Pending</span>
                @break
            @case('open')
            <span class="bg-green-200 text-green-800 font-bold text-lg p-4 px-8">Open</span>
                @break
            @case('closed')
            <span class="bg-orange-200 text-orange-800 font-bold text-lg p-4 px-8">Closed</span>
                @break
                
        @endswitch
      </td>

    </tr>
    @endforeach
   
  </tbody>
</table>
@else 
<div class="bg-blue-200 text-blue-800 text-2xl p-5 py-6 rounded-lg mb-3 mt-8">
 No ticket yet,Feel free to contact us, we are happy to help
</div>
@endif
{{$tickets->links()}}
</div>