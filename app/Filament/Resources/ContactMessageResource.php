<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Utilities';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
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
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
