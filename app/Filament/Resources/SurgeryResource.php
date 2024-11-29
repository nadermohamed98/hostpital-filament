<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurgeryResource\Pages;
use App\Filament\Resources\SurgeryResource\RelationManagers;
use App\Models\Surgery;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurgeryResource extends Resource
{
    protected static ?string $model = Surgery::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationGroup = 'Clients';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                Select::make('type')->options([
                    'gyn' => 'Gyn',
                    'male' => 'Male',
                ]),
                Select::make('patient_id')
                    ->relationship('patient', 'name')
                    ->preload()
                    ->searchable(),
                Select::make('doctor_id')
                    ->relationship('doctor', 'name')
                    ->preload()
                    ->searchable(),
                DatePicker::make('performed_at'),
                TextInput::make('amount')
                    ->numeric(),
                TextInput::make('payed')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('type')
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->badge()
                    ->color(
                        fn($record) => $record->type === 'gyn' ? 'success' : 'primary'
                    ),
                TextColumn::make('patient.name')
                    ->searchable(),
                TextColumn::make('amount')
                    ->formatStateUsing(fn($state) => $state . ' EGP'),
                TextColumn::make('paid')
                    ->formatStateUsing(fn($state) => $state . ' EGP'),
                TextColumn::make('doctor.name')
                    ->searchable(),
                TextColumn::make('performed_at')
                    ->formatStateUsing(fn($record) => $record->performed_at->format('d-m-Y \a\t g:ia'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurgeries::route('/'),
            'create' => Pages\CreateSurgery::route('/create'),
            'edit' => Pages\EditSurgery::route('/{record}/edit'),
        ];
    }
}
