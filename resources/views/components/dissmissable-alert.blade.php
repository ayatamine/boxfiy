<div x-data="{ isOpen: true }">
    <!-- Dismissible Alert -->
    <div
        x-show="isOpen"
        class=" text-white text-2xl p-5 mx-5 py-6 rounded-lg mb-6 relative
        @if($type =="success") bg-green-500 @else bg-red-500 @endif"
        
        role="alert"
    >
        {{$slot}}
        <button
            @click="isOpen = false"
            class="absolute top-5 right-0 m-2 text-white hover:text-gray-200 cursor-pointer"
        >
            <svg
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                class="w-6 h-6"
            >
                <path
                    fill-rule="evenodd"
                    d="M3.293 3.293a1 1 0 011.414 0L10 8.586l5.293-5.293a1 1 0 111.414 1.414L11.414 10l5.293 5.293a1 1 0 01-1.414 1.414L10 11.414l-5.293 5.293a1 1 0 01-1.414-1.414L8.586 10 3.293 4.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </button>
    </div>
</div>