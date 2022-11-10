<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3 mb-3">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{ __('Your profile') }}</h1>
                </div>
            </div>        
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3 mb-3">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>User information</h2>
                    <form action="{{ route('profile', Auth::user()->id) }}" method="post">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
            
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-2">
                            {{ __('Save') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</x-app-layout>
