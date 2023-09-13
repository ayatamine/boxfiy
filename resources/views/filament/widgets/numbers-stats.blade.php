<x-filament::widget>
  
    <x-filament::card>
        <form wire:submit.prevent='filterData' class="md:flex items-center justify-end gap-2 mb-4">
            <div class="flex items-center justify-start gap-3 space-x-2 ">
                <label for="fromDate" class="text-gray-600 w-[3rem] md:w-auto">From:</label>
                <input
                    type="date"
                    id="fromDate"
                    wire:model.defer="from"
                    class="border border-gray-300 rounded px-2 py-0.5"
                >
            </div>
            <div class="flex items-center justify-start gap-8 md:gap-2 space-x-2 mt-2">
                <label for="toDate" class="text-gray-600 ">To:</label>
                <input
                    type="date"
                    id="toDate"
                    wire:model.defer="to"
                    class="border border-gray-300 rounded px-2 py-0.5"
                >
            </div>
            <button type="submit"
                class="bg-blue-500 mt-3 md:mt-0 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-300"
            >
                Apply
            </button>
        </form>
        <div class="flex space-x-0 md:space-x-4 mt-3 border flex-wrap">
            <div class="bg-white border-r border-b md:border-b-0 rounded p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-md font-semibold">Users</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-4xl text-gray-700 font-semibold">{{$users}}</div>
                    <div class="ml-2 text-gray-500"></div>
                </div>
              
            </div>
            
            <div class="bg-white border-r  border-b md:border-b-0 rounded p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-md font-semibold">Transactions</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-4xl text-gray-700 font-semibold">{{$transactions}}</div>
                    <div class="ml-2 text-gray-500"></div>
                </div>
              
            </div>
            <div class="bg-white border-r  border-b md:border-b-0 rounded p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-md font-semibold">Orders</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-4xl text-gray-700 font-semibold">{{$orders}}</div>
                    <div class="ml-2 text-gray-500"></div>
                </div>
              
            </div>
            <div class="bg-white border-r  border-b md:border-b-0 rounded p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-md font-semibold">Amount(orders)</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-4xl text-gray-700 font-semibold">{{$amount}}</div>
                    <div class="ml-2 text-gray-500">$</div>
                </div>
              
            </div>
            <div class="bg-white border-r rounded p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-md font-semibold">Users Balance</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-4xl text-gray-700 font-semibold">{{$users_balance}}</div>
                    <div class="ml-2 text-gray-500">$</div>
                </div>
              
            </div>
            
           
        </div>
        
    </x-filament::card>
</x-filament::widget>
