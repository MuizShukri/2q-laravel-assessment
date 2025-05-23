<div x-data="{ showConfirm: false }" class="inline-block">
    <!-- Trigger Button -->
    <button @click="showConfirm = true" class="text-center text-xs px-2 py-2 rounded bg-red-500 hover:bg-red-600 text-white transition">
        {{ __('Delete') }}
    </button>

    <!-- Confirmation Modal -->
    <div x-show="showConfirm" x-cloak
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <h3 class="text-lg font-semibold mb-4">{{ __('Confirm Deletion') }}</h3>
            <p class="text-gray-700 mb-4">
                {{ __('Are you sure you want to delete') }} <strong>{{ $itemName }}</strong>?
            </p>
            <div class="flex justify-end gap-2">
                <button @click="showConfirm = false"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded">
                    {{ __('Cancel') }}
                </button>
                <button @click="@this.call('{{ $wireAction }}', {{ $itemId }}); showConfirm = false"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">
                    {{ __('Delete') }}
                </button>
            </div>
        </div>
    </div>
</div>
