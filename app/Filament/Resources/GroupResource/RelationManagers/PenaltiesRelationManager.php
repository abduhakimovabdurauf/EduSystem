<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

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
                Forms\Components\Select::make('student_id')
                    ->relationship(
                        'student',
                        'name',
                        fn ($query, $livewire) => $query->where('group_id', $livewire->ownerRecord->id)
                    )
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

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                    ])
                    ->default('paid')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Penalties')
            ->description(function () {
                $total = $this->getOwnerRecord()->penalties()->sum('amount');
                return 'Total penalties: ' . number_format($total) . ' soʻm';
            })
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date(),

                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'paid',
                        'danger' => 'unpaid',
                    ])
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\Action::make('resetPenalties')
                    ->label('Reset Penalties')
                    ->requiresConfirmation()
                    ->action(fn () => $this->getOwnerRecord()->penalties()->delete()),
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
