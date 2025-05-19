<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Companies') }}
    </h2>
</x-slot>
<section class="max-w-6xl mx-auto py-6">
    {{-- Form --}}
    <form wire:submit.prevent="update" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        {{-- Card Header --}}
        <div class="flex justify-between px-6 py-4">
            <div class="flex flex-col">
                <h1 class="font-semibold text-xl pb-4 text-gray-800">
                    Edit Companies
                </h1>
                <p class="text-lg text-gray-600">Company Information</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('companies.index') }}" class="h-10 text-center px-4 py-2 rounded bg-gray-600 hover:bg-gray-700 text-white transition">
                    Cancel
                </a>
                <button type="submit" class="h-10 px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">
                    Update
                </button>
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
                        <span class="text-red-600">*</span>                        
                    </label>
                    <input type="text" id="name" wire:model.defer="name" 
                        class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="Enter name">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-md text-gray-700 mb-1 font-semibold">
                        Email Address
                    </label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="Enter email">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- Second Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                {{-- Logo --}}
                <div class="flex flex-col">
                    <label for="logo" class="block text-md text-gray-800 font-semibold mb-2">
                        Logo
                    </label>
                    <input type="file" id="logo" wire:model.defer="logo" accept="image/*"
                        class="block w-full text-sm text-gray-800 mb-2
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:bg-blue-600 file:text-white file:font-medium
                            hover:file:bg-blue-700
                            focus:outline-none focus:ring-2 focus:ring-blue-400
                            transition ease-in-out duration-150" />

                    @if ($logo)
                        <div class="mb-3">
                            <img src="{{ $logo->temporaryUrl() }}" alt="Logo"
                                class="h-24 w-24 object-cover rounded border" />
                        </div>
                    @else
                        @if ($currentLogo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $currentLogo) }}" alt="Current Logo"
                                    class="h-24 w-24 object-cover rounded border" />
                            </div>
                        @endif
                    @endif

                    @error('logo')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Website --}}
                <div>
                    <label for="website" class="block text-md text-gray-700 mb-1 font-semibold">
                        Website
                    </label>
                    <input type="url" id="website" wire:model.defer="website"
                        class="w-full border @error('website') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="Enter website">
                    @error('website')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        {{-- Footer --}}
        <div class="p-4 border-t text-sm text-gray-600 text-center">
            ...
        </div>
    </form>
</section>