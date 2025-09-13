<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Lesson;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Illuminate\Database\Eloquent\Model;

class AttendanceEntry extends Page implements HasForms
{
    use InteractsWithForms;
    use InteractsWithRecord;

    protected static string $resource = LessonResource::class;
    protected static ?string $title = 'Davomat kiritish';
    protected static string $view = 'filament.resources.group-resource.pages.group-resource.attendance-journal';

    protected function getRecord(): Model
    {
        return Group::findOrFail($this->record);
    }

    public function getStudents()
    {
        return $this->getRecord()
            ->group
            ->students()
            ->orderBy('name')
            ->get();
    }

    public function isPresent($studentId)
    {
        return $this->getRecord()
            ->attendances()
            ->where('student_id', $studentId)
            ->first()?->is_present;
    }

    public function updateAttendance($studentId, $state)
    {
        $lesson = $this->getRecord();

        $attendance = $lesson->attendances()->firstOrNew([
            'student_id' => $studentId,
        ]);

        $attendance->is_present = $state;
        $attendance->save();

        Notification::make()
            ->title('Davomat yangilandi!')
            ->success()
            ->send();
    }
}
