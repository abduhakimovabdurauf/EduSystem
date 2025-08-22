<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class PenaltiesRelationManager extends RelationManager
{
    protected static string $relationship = 'penalties';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('group_id')
                    ->relationship('group', 'name')
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->default(5000)
                    ->required(),

                Forms\Components\Select::make('reason')
                    ->label('Reason')
                    ->options([
                        'homework' => 'Uyga vazifa bajarilmadi',
                        'cheating' => 'Ko`chirildi',
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group.name')->label('Group'),
                Tables\Columns\TextColumn::make('amount')->label('Amount')->money('UZS'),
                Tables\Columns\TextColumn::make('reason')->label('Reason')->limit(30),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d.m.Y H:i'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
