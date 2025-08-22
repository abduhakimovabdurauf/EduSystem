<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->options(function ($livewire) {
                        $groupId = $livewire->ownerRecord->id;
                        return Student::where('group_id', $groupId)->pluck('name', 'id');
                    })
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('amount')
                    ->label('Amount')
                    ->numeric()
                    ->required(),

                Forms\Components\Select::make('month')
                    ->label('Month')
                    ->options([
                        'January' => 'January',
                        'February' => 'February',
                        'March' => 'March',
                        'April' => 'April',
                        'May' => 'May',
                        'June' => 'June',
                        'July' => 'July',
                        'August' => 'August',
                        'September' => 'September',
                        'October' => 'October',
                        'November' => 'November',
                        'December' => 'December',
                    ])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                        'partial' => 'Partial',
                    ])
                    ->default('paid')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->money('uzs', true)
                    ->sortable(),


                Tables\Columns\TextColumn::make('month')
                    ->label('Month')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'paid',
                        'danger' => 'unpaid',
                        'warning' => 'partial',
                    ])
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                        'partial' => 'Partial',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
