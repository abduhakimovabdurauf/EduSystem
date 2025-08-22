<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationLabel = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('group_id')
                    ->label('Group')
                    ->relationship('group', 'name')
                    ->preload()
                    ->searchable()
                    ->nullable(),

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('group.name')
                    ->label('Group')
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
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
