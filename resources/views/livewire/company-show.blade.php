<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Companies') }}
    </h2>
</x-slot>
<section class="max-w-6xl mx-auto py-6">
    {{-- Form Save --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        {{-- Card Header --}}
        <div class="flex justify-between px-6 py-4">
            <div class="flex flex-col">
                <h1 class="font-semibold text-xl pb-4 text-gray-800">
                    Company Information
                </h1>
                {{-- <p class="text-lg text-gray-600">Company Information</p> --}}
            </div>
            <div class="flex gap-2">
                <a href="{{ route('companies.index') }}" class="h-10 text-center px-4 py-2 rounded bg-gray-600 hover:bg-gray-700 text-white transition">
                    Back
                </a>
            </div>
        </div>
        {{-- Card Body: Inputs --}}
        <div class="overflow-x-auto p-6 gap-6">
            {{-- First Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-md text-gray-700 mb-1 font-semibold">
                        Name
                    </label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" disabled>
                </div>
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-md text-gray-700 mb-1 font-semibold">
                        Email Address
                    </label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" disabled>
                </div>
            </div>
            {{-- Second Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                {{-- Logo --}}
                <div>
                    <label for="logo" class="block text-md text-gray-700 mb-1 font-semibold">
                        Logo
                    </label>
                    @if ($currentLogo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $currentLogo) }}" alt="Current Logo"
                                class="h-24 w-24 object-cover rounded border" />
                        </div>
                    @else
                        <span class="text-gray-400 text-s italic">No Logo</span>
                    @endif
                </div>
                {{-- Website --}}
                <div>
                    <label for="website" class="block text-md text-gray-700 mb-1 font-semibold">
                        Website
                    </label>
                    <input type="url" id="website" wire:model.defer="website"
                        class="w-full border @error('website') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" disabled>
                </div>
            </div>
        </div>
        {{-- Footer --}}
        <div class="p-4 border-t text-sm text-gray-600 text-center">
            ...
        </div>
    </div>
</section>