<?php

namespace App\Filament\Resources\GroupResource\Pages;

use App\Filament\Resources\GroupResource;
use App\Models\Group;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class AttendanceJournal extends Page
{
    use InteractsWithRecord;

    protected static string $resource = GroupResource::class;
    protected static ?string $title = 'Davomat Jurnali';
    protected static string $view = 'filament.resources.group-resource.pages.attendance-journal';

    // public Group $record;

    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getStudents()
    {
        return $this->record
            ->students()
            ->orderBy('name')
            ->get();
    }

    public function getLessons()
    {
        return $this->record
            ->lessons()
            ->orderBy('date')
            ->get();
    }

    public function getAttendanceStatus($lesson, $student)
    {
        return $lesson->attendances()
            ->where('student_id', $student->id)
            ->first()?->is_present;
    }
}
