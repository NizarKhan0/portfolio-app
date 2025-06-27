<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Skill;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-fire';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Basic info
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('project-images'),
                //  ->required(),

                // Pivot tech_stack (multi-select from skills) method
                Forms\Components\Select::make('skills')
                    ->multiple()
                    ->relationship('skills', 'name')
                    ->searchable()
                    ->preload(),

                // Dynamic tech_stack (multi-select from skills) JSON array method
                //  Forms\Components\Select::make('tech_stack')
                //      ->multiple()
                //      ->options(Skill::all()->pluck('name', 'id'))
                //      ->required(),

                // Links & metadata
                Forms\Components\TextInput::make('demo_link')->url(),
                Forms\Components\TextInput::make('github_link'),
                Forms\Components\Toggle::make('featured'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->defaultImageUrl(url('default.jpg'))
                    ->size(50),
                // Tables\Columns\TextColumn::make('demo_link'),
                // Tables\Columns\TextColumn::make('github_link'),
                // Tables\Columns\TextColumn::make('featured'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
