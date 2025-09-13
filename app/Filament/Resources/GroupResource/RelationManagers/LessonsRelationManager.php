<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

use App\Filament\Resources\LessonResource;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\RelationManagers\RelationManager;

class LessonsRelationManager extends RelationManager
{
    protected static string $relationship = 'lessons';
    protected static ?string $title = 'Darslar';

    // protected static string $view = 'filament.resources.group-resource.pages.group-resource.attendance-journal.blade.php';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')
                    ->required()
                    ->native(false)
                    ->displayFormat('d M, Y')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                TextColumn::make('date')
                    ->date('d M, Y')
                    ->sortable()
                    ->label('Sana'),
                TextColumn::make('attendances_count')
                    ->counts('attendances')
                    ->label('Davomatlar soni')
                    ->badge()
                    ->color('info')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('attendance')
                    ->label('Davomat')
                    ->icon('heroicon-o-calendar-days')
                    ->url(fn(Lesson $record): string => LessonResource::getUrl('attendance', ['record' => $record->getRouteKey()]))
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
