<?php

namespace App\Filament\Resources\TeacherResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class GroupsRelationManager extends RelationManager
{
    protected static string $relationship = 'groups';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Group Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('level')
                    ->label('Level')
                    ->required()
                    ->maxLength(100),

                Forms\Components\DatePicker::make('start_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('start_date'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
