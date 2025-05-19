<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Companies') }}
    </h2>
</x-slot>
<section class="max-w-6xl mx-auto py-6">
    {{-- Saved/Updated Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-medium bg-green-100 border border-green-300 p-3 rounded relative">
            {{ session('message') }}
            <button type="button"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                onclick="this.parentElement.remove();">
                <svg class="h-4 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    {{-- Card --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        {{-- Card Header --}}
        <div class="flex flex-col px-6 py-4">
            <a href="{{ route('companies.create') }}" class="h-10 w-fit inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
                + {{ __('Add New Company') }}
            </a>
        </div>
        {{-- Card Body: Table --}}
        <div class="max-h-[600px] overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                {{-- Table Header --}}
                <thead class="sticky top-0 bg-white border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 font-semibold">{{ __('Name') }}</th>
                        <th class="px-6 py-3 font-semibold">{{ __('Email') }}</th>
                        <th class="px-6 py-3 font-semibold">{{ __('Website') }}</th>
                        <th class="px-6 py-3 font-semibold">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($companies as $company)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo"
                                            class="h-14 w-14 object-contain rounded border border-gray-200 bg-white" />
                                    @else
                                        <span class="text-gray-400 text-sm italic">{{ __('No Logo') }}</span>
                                    @endif
                                    <span>{{ $company->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($company->email)
                                    {{ $company->email }}
                                @else
                                    <span class="text-gray-400 text-sm italic">{{ __('No Email') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($company->website)
                                    <a href="{{ $company->website }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ $company->website }}
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm italic">{{ __('No Website') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('companies.show', $company->id) }}" class="text-center text-xs px-2 py-2 rounded bg-blue-500 hover:bg-blue-600 text-white transition">
                                    {{ __('View') }}
                                </a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="text-center text-xs px-2 py-2 rounded bg-yellow-500 hover:bg-yellow-600 text-white transition">
                                    {{ __('Edit') }}
                                </a>
                                <x-confirm-delete-popup :item-id="$company->id" :item-name="$company->name" wire-action="delete" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-400 italic">
                                {{ __('No companies found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Footer --}}
        <div class="p-4 border-t text-sm text-gray-600 text-center">
            ...
        </div>
    </div>
</section>
