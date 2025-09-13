<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-xl font-bold mb-4">📊 Guruhlar bo‘yicha o‘quvchilar to‘lovlari</h2>
        <div 
            x-data="{ activeTab: '{{ $this->getGroups()->first()->id ?? '' }}' }"
            class="space-y-4"
        >
            <div class="flex gap-2 border-b">
                @foreach($this->getGroups() as $group)
                    <button 
                        class="px-4 py-2 text-sm font-medium border-b-2"
                        :class="activeTab === '{{ $group->id }}' ? 'border-primary-600' : 'border-transparent text-gray-500'"
                        @click="activeTab = '{{ $group->id }}'"
                    >
                        {{ $group->name }}
                    </button>
                @endforeach
            </div>

            @foreach($this->getGroups() as $group)
                <div x-show="activeTab === '{{ $group->id }}'" class="border rounded-lg shadow p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full mt-3 rounded-md min-w-[600px]">
                            @php
                                $currentMonth = now()->month;
                            @endphp

                            <thead>
                                <tr>
                                    <th class="border px-2 py-1">#</th>
                                    <th class="border px-2 py-1 text-left">O‘quvchi</th>
                                    @foreach(range($currentMonth, 1) as $month)
                                        <th class="border px-2 py-1">
                                            {{ \Carbon\Carbon::create()->month($month)->format('M') }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group->students as $index => $student)
                                    <tr>
                                        <td class="border px-2 py-1 text-center">{{ $index + 1 }}</td>
                                        <td class="border px-2 py-1">{{ $student->name }}</td>
                                        @foreach(range($currentMonth, 1) as $month)
                                            @php
                                                $monthName = \Carbon\Carbon::create()->month($month)->format('F');
                                                $paid = $student->payments
                                                    ->where('month', $monthName)
                                                    ->where('status', 'paid')
                                                    ->isNotEmpty();
                                            @endphp
                                            <td class="border px-2 py-1 text-center">
                                                {{ $paid ? '✅' : '❌' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
