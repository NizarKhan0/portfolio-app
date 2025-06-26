<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('job_title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    // ->required()
                    ->rows(3),
                Forms\Components\FileUpload::make('image')
                    // ini dari path storage/app/public
                    ->disk('public')
                    ->directory('profile')
                    ->image(),
                // ->required(),
                Forms\Components\TextInput::make('location')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('job_title'),
                // Tables\Columns\TextColumn::make('description'),
                // Tables\Columns\TextColumn::make('location'),
                // Tables\Columns\TextColumn::make('email'),
                // Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Profile Picture')
                    ->defaultImageUrl(url('default.jpg'))
                    // ->disk('public') // or 'local', 's3', etc.
                    // ->path('profile') // subfolder inside 'storage/app/public'
                    ->size(50) // image size in px
                    ->square(), // make it square
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-M-Y'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-M-Y'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
