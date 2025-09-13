<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Select::make('lesson_id')
                ->relationship('lesson', 'date')
                ->required()
                ->searchable()
                ->preload(),
            Select::make('student_id')
                ->relationship('student', 'name')
                ->required()
                ->searchable()
                ->preload(),
            Toggle::make('is_present')
                ->label('Darsda qatnashdi')
                ->inline(false)
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lesson.date')
                    ->date('d M, Y')
                    ->sortable()
                    ->label('Dars sanasi'),
                TextColumn::make('student.name')
                    ->sortable()
                    ->searchable()
                    ->label('Talaba nomi'),
                IconColumn::make('is_present')
                    ->label('Qatnashdi')
                    ->boolean(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
