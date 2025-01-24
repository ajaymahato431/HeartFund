<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'User Settings';

    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('User Information')
                    ->schema([
                        Fieldset::make('Personal Details')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Full Name')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
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
                                    ->columnSpanFull()
                                    ->nullable(),
                            ])
                            ->columns(3),
                    ]),

                Section::make('Social Media')
                    ->schema([
                        Fieldset::make('Social Media Details')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('insta')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('linkedin')
                                    ->maxLength(255)
                                    ->default(null),
                            ])
                            ->columns(3),
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
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('blood_group')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'approved' => 'Approved',
                        'pending' => 'Pending'
                    ]),

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
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'view' => Pages\ViewVolunteer::route('/{record}'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }
}
