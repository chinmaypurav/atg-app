<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Form Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('status'))
                        <div class="text-green-500">
                            {{session('status')}}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('form.store') }}">
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" 
                                    type="text" 
                                    name="name" 
                                    autocomplete="off"
                                    :value="old('name')" required autofocus />
                        </div class="mt-4">

                        <!-- Email -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" 
                                    type="email" 
                                    name="email" 
                                    autocomplete="off"
                                    :value="old('email')" required />
                        </div>

                        <!-- Pincode -->
                        <div class="mt-4">
                            <x-label for="pincode" :value="__('Pincode')" />

                            <x-input id="email" class="block mt-1 w-full" 
                                    type="text" 
                                    name="pincode" 
                                    pattern="[0-9]{6}"
                                    title="Enter only numbers"
                                    minlength="6"
                                    maxlength="6"
                                    autocomplete="off"
                                    :value="old('pincode')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">        
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>