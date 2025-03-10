<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Filament\Resources\DonationResource\RelationManagers;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Charity';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('campaign_id')
                    ->required()
                    ->relationship('campaign', 'title'),
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),

                Forms\Components\Select::make('payment_method')
                    ->default('cash')
                    ->options([
                        'card' => 'Card',
                        'bank_transfer' => 'Bank Transfer',
                        'cash' => 'Cash',
                        'esewa' => 'Esewa',
                        'khalti' => 'Khalti',
                        'imepay' => 'IME Pay'
                    ])
                    ->required(),
                Forms\Components\Select::make('payment_status')
                    ->default('completed')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('transaction_proof')
                    ->ImageEditor()
                    ->default(null),
                Forms\Components\Textarea::make('donor_message')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('campaign.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\SelectColumn::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed'
                    ]),
                Tables\Columns\ImageColumn::make('transaction_proof'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'view' => Pages\ViewDonation::route('/{record}'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
