<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('DZD'),
                Forms\Components\Select::make('category')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->disk(env('STORAGE_DISK'))
                    ->preserveFilenames()
                    ->rules(['image', 'mimes:jpeg,png,jpg']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->url(function ($record) {
                        return route('filament.admin.resources.suppliers.view', ['record' => $record->supplier_id]);
                    }, true),
                Tables\Columns\TextColumn::make('brand.name')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->url(function ($record) {
                        return route('filament.admin.resources.brands.view', ['record' => $record->brand_id]);
                    }, true),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categories')
                    ->listWithLineBreaks(),
                Tables\Columns\TextColumn::make('price')
                    ->money('DZD')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('Categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                SelectFilter::make('Supplier')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
