<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Companies') }}
    </h2>
</x-slot>
<section class="max-w-6xl mx-auto py-6">
    {{-- Form Save --}}
    <form wire:submit.prevent="save" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        {{-- Card Header --}}
        <div class="flex justify-between px-6 py-4">
            <div class="flex flex-col">
                <h1 class="font-semibold text-xl pb-4 text-gray-800">
                    {{ __('Create Company') }}
                </h1>
                <p class="text-lg text-gray-600">
                    {{ __('Company Information') }}
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('companies.index') }}" class="h-10 text-center px-4 py-2 rounded bg-gray-600 hover:bg-gray-700 text-white transition">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="h-10 px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white transition">
                    {{ __('Save') }}
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
                        {{ __('Name') }}
                        <span class="text-red-600">*</span>                        
                    </label>
                    <input type="text" id="name" wire:model="name"
                        class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="{{ __('Enter name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-md text-gray-700 mb-1 font-semibold">
                        {{ __('Email Address') }}
                    </label>
                    <input type="email" id="email" wire:model="email"
                        class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="{{ __('Enter email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- Second Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                {{-- Logo --}}
                <div>
                    <label for="logo" class="block text-md text-gray-700 mb-1 font-semibold">
                        {{ __('Logo') }}
                    </label>
                    <input type="file" id="logo" wire:model="logo" accept="image/*"
                        class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                            file:rounded-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-600 file:text-white
                            hover:file:bg-blue-700
                            cursor-pointer" />
                    @if ($logo)
                        <div class="mb-3">
                            <img src="{{ $logo->temporaryUrl() }}" alt="{{ __('Logo') }}"
                                class="h-24 w-24 object-cover rounded border" />
                        </div>
                    @endif
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Website --}}
                <div>
                    <label for="website" class="block text-md text-gray-700 mb-1 font-semibold">
                        {{ __('Website') }}
                    </label>
                    <input type="url" id="website" wire:model="website"
                        class="w-full border @error('website') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="{{ __('Enter website') }}">
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