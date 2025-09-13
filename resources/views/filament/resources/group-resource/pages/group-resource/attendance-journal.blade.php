{{-- ~/resources/views/filament/resources/group-resource/pages/group-resource/attendance-journal.blade.php --}}


<?php 
    dd($this->record)
?>
<x-filament-panels::page>
    <div class="fi-page-header">
        <h1 class="fi-page-header-heading">
            {{ $this->record->name }} Guruhining Davomat Jurnali
        </h1>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        Ismi
                    </th>
                    {{-- @foreach ($this->getLessons() as $lesson)
                        <th scope="col" class="py-3 px-6 text-center whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($lesson->date)->format('d-M') }}
                        </th>
                    @endforeach --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getStudents() as $student)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $student->name }}
                        </td>
                        @foreach ($this->getLessons() as $lesson)
                            <td class="py-4 px-6 text-center">
                                @php
                                    $isPresent = $this->getAttendanceStatus($lesson, $student);
                                @endphp
                                @if ($isPresent === true)
                                    <span class="text-green-500">&#10004;</span>
                                @elseif ($isPresent === false)
                                    <span class="text-red-500">&#10008;</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament-panels::page>