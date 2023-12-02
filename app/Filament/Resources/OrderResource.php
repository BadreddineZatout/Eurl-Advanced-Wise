<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->minValue(1),
                TextInput::make('total')
                    ->numeric()
                    ->hiddenOn(['create', 'edit']),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'refused' => 'Refused',
                        'completed' => 'Completed',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')->searchable(),
                TextColumn::make('product.name')->searchable(),
                TextColumn::make('quantity'),
                TextColumn::make('total'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'completed' => 'success',
                        'accepted' => 'warning',
                        'refused' => 'danger',
                        'cancelled' => 'danger',
                    }),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('customer')
                    ->relationship('customer', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                SelectFilter::make('product')
                    ->relationship('product', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'refused' => 'Refused',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                ActionGroup::make([
                    Action::make('Accept Order')
                        ->color('warning')
                        ->icon('heroicon-o-check-circle')
                        ->action(function ($record) {
                            $record->status = 'accepted';
                            $record->save();
                        })->hidden(function ($record) {
                            return ! $record->isPending();
                        }),
                    Action::make('Refuse Order')
                        ->color('danger')
                        ->icon('heroicon-o-x-circle')
                        ->action(function ($record) {
                            $record->status = 'refused';
                            $record->save();
                        })->hidden(function ($record) {
                            return ! $record->isPending();
                        }),
                    Action::make('Mark as Completed')
                        ->color('success')
                        ->icon('heroicon-o-hand-thumb-up')
                        ->action(function ($record) {
                            $record->status = 'completed';
                            $record->save();
                        })->hidden(function ($record) {
                            return ! $record->isAccepted();
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
