<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages\AttendanceEntry;
use App\Filament\Resources\LessonResource\Pages;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\LessonResource\RelationManagers;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('group_id')
                            ->relationship('group', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        DatePicker::make('date')
                            ->required()
                            ->native(false)
                            ->displayFormat('d M, Y'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group.name')
                    ->searchable()
                    ->sortable()
                    ->label('Guruh nomi'),
                TextColumn::make('date')
                    ->date('d M, Y')
                    ->sortable()
                    ->label('Sana'),
                TextColumn::make('attendances_count')
                    ->counts('attendances')
                    ->label('Davomatlar soni')
                    ->badge()
                    ->color('primary')
            ])
            ->defaultSort('date', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('attendance')
                    ->label('Davomat')
                    ->icon('heroicon-o-calendar-days')
                    ->url(fn(Lesson $record): string => static::getUrl('attendance', ['record' => $record->getRouteKey()]))
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
            'attendance' => AttendanceEntry::route('/{record}/attendance'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AttendancesRelationManager::class,
        ];
    }
}
