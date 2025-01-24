<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                    ->schema([
                        Fieldset::make('Account Details')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Full Name')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                DateTimePicker::make('email_verified_at')
                                    ->label('Email Verified At'),

                                TextInput::make('password')
                                    ->password()
                                    ->hiddenOn('edit')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Personal Details')
                    ->schema([
                        Repeater::make('user_details')
                            ->relationship('userDetails')
                            ->label('')
                            ->schema([
                                TextInput::make('phone')
                                    ->label('Phone')
                                    ->maxLength(15)
                                    ->nullable(),

                                TextInput::make('address')
                                    ->label('Address')
                                    ->nullable(),

                                TextInput::make('country')
                                    ->label('Country')
                                    ->nullable(),

                                TextInput::make('blood_group')
                                    ->label('Blood Group')
                                    ->nullable(),

                                FileUpload::make('profile_img')
                                    ->label('Profile Image')
                                    ->ImageEditor()
                                    ->nullable(),
                            ])
                            ->defaultItems(1)
                            ->columns(3)
                            ->columnSpanFull()
                            ->deletable(false)
                            ->disableItemCreation(),
                    ]),
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
                Tables\Columns\TextColumn::make('userDetails.phone')
                    ->label('Phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('userDetails.address')
                    ->label('Address')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('userDetails.country')
                    ->label('Country')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
