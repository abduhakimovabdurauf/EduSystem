<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Models\Group;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\GroupResource\RelationManagers\StudentsRelationManager;
use App\Filament\Resources\GroupResource\RelationManagers\PaymentsRelationManager;
use App\Filament\Resources\GroupResource\RelationManagers\PenaltiesRelationManager;
class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Groups';
    protected static ?string $pluralLabel = 'Groups';
    protected static ?string $modelLabel = 'Group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Group Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teacher', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('level')
                    ->label('Level')
                    ->options([
                        'beginner' => 'Beginner',
                        'elementary' => 'Elementary',
                        'intermediate' => 'Intermediate',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Group Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Teacher')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('level')
                    ->label('Level')
                    ->badge()
                    ->colors([
                        'success' => 'beginner',
                        'warning' => 'intermediate',
                        'danger' => 'advanced',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:i')
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-m-Y H:i')
                    ->label('Updated At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                    ->label('Level')
                    ->options([
                        'beginner' => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced' => 'Advanced',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class,
            PaymentsRelationManager::class,
            PenaltiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
