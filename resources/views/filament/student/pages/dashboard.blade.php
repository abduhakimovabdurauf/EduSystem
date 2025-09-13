<x-filament-panels::page>
    <div class="space-y-6">
         <div class="shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-white">
                👋 Salom, {{ $this->getStudent()->name }}
            </h2>
            <p class="mt-2 text-white">
                📌 Guruh: <span class="font-semibold text-white">
                    {{ $this->getStudent()->group->name ?? '-' }}
                </span>
            </p>
        </div>

        <div class="p-6 bg-gray-500">
            <h3 class="text-2xl font-semibold text-white border-b border-gray-700 pb-3 mb-4">💰  To‘lovlaringiz</h3>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-700 rounded-lg border-separate border-spacing-0">
                    <thead class="bg-gray-800 text-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">Miqdor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">Oy</th>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">To'langan Sana</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->getStudent()->payments as $payment)
                            <tr class="hover:bg-gray-700 transition">
                                <td class="px-6 py-3 text-white font-medium border border-gray-700">
                                    {{ $payment->amount }} so'm
                                </td>
                                <td class="px-6 py-3 text-white font-medium border border-gray-700">
                                    {{ $payment->month }}
                                </td>
                                <td class="px-6 py-3 text-gray-300 border border-gray-700">
                                    {{ $payment->created_at->format('d.m.Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-center text-gray-400 italic border border-gray-700">
                                    To‘lovlar mavjud emas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        <div class="p-6 bg-gray-900">
            <h3 class="text-2xl font-semibold text-white border-b border-gray-700 pb-3 mb-4">⚠️ Jarimalaringiz</h3>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-700 rounded-lg border-separate border-spacing-0">
                    <thead class="bg-gray-800 text-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">Miqdor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">Sabab</th>
                            <th class="px-6 py-3 text-left text-sm font-medium border border-gray-700">Sana</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->getStudent()->penalties as $penalty)
                            <tr class="hover:bg-gray-700 transition">
                                <td class="px-6 py-3 text-red-400 font-semibold border border-gray-700">{{ $penalty->amount }} so'm</td>
                                <td class="px-6 py-3 text-gray-300 border border-gray-700">
                                    {{ $penalty->reason ?? 'Sabab ko‘rsatilmagan' }}
                                </td>
                                <td class="px-6 py-3 text-gray-300 border border-gray-700">
                                    {{ $penalty->created_at->format('d.m.Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-center text-gray-400 italic border border-gray-700">
                                    Jarimalar mavjud emas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-filament-panels::page>
