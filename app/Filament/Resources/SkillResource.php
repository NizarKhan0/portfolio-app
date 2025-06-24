<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Skill;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SkillCategory;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SkillResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SkillResource\RelationManagers;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                // Updated category field
                Forms\Components\Select::make('skill_category_id')
                    ->label('Category')
                    ->options(SkillCategory::pluck('name', 'id'))
                    ->searchable()
                    // ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->unique(SkillCategory::class, 'name', ignoreRecord: true)
                            ->required(),
                        Forms\Components\TextInput::make('icon')
                            ->required()
                            ->default('fas fa-code')
                            ->hint('Font Awesome icon class'),
                    ])
                    ->createOptionUsing(function (array $data) {
                        $category = SkillCategory::create($data);
                        return $category->id;
                    }),
                // Forms\Components\ColorPicker::make('color')
                //     ->required(),
                Forms\Components\TextInput::make('proficiency')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name') // Updated to show category name
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\ColorColumn::make('color')
                //     ->copyable()
                //     ->copyMessage('Color copied!'),
                Tables\Columns\TextColumn::make('proficiency')
                    ->suffix('%')
                    ->sortable(),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
