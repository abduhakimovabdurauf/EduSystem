<x-filament-widgets::widget>
    <x-filament::section>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 text-white shadow rounded-2xl">
                <h3 class="text-lg font-semibold">👥 Guruhlar soni</h3>
                <p class="text-3xl font-bold mt-2">
                    {{ \App\Models\Group::count() }}
                </p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>