<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SkillCategory;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SkillCategoryResource\Pages;
use App\Filament\Resources\SkillCategoryResource\RelationManagers;

class SkillCategoryResource extends Resource
{
    protected static ?string $model = SkillCategory::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\TextInput::make('icon')
                    ->required()
                    ->default('fas fa-code')
                    ->hint('Font Awesome icon class'),
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
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('skills_count')
                    ->counts('skills')
                    ->label('Skills')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                // Cannot delete category if it has skills
                Tables\Actions\DeleteAction::make()
                    ->before(function (Model $record, Tables\Actions\DeleteAction $action) {
                        if ($record->skills()->exists()) {
                            Notification::make()
                                ->warning()
                                ->title('Cannot delete category')
                                ->body("The '{$record->name}' category has skills assigned. Please remove them first.")
                                ->send();
                            $action->cancel();
                        }
                    })
                    ->tooltip(function (Model $record) {
                        if ($record->skills()->exists()) {
                            return 'Category has skills - cannot delete';
                        }
                        return 'Delete category';
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records, Tables\Actions\DeleteBulkAction $action) {
                            $hasSkills = false;

                            foreach ($records as $record) {
                                if ($record->skills()->count() > 0) {
                                    $hasSkills = true;
                                    break;
                                }
                            }

                            if ($hasSkills) {
                                Notification::make()
                                    ->warning()
                                    ->title('Cannot delete categories')
                                    ->body('Some categories have skills assigned. Please reassign or delete the skills first.')
                                    ->send();

                                // This prevents the bulk deletion
                                $action->cancel();
                            }
                        }),
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
            'index' => Pages\ListSkillCategories::route('/'),
            'create' => Pages\CreateSkillCategory::route('/create'),
            'edit' => Pages\EditSkillCategory::route('/{record}/edit'),
        ];
    }
}
