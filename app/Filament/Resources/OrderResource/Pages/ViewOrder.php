<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('Accept Order')
                ->color('warning')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record) {
                    $record->status = 'accepted';
                    $record->save();
                })->hidden(function ($record) {
                    return !$record->isPending();
                }),
            Action::make('Refuse Order')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->action(function ($record) {
                    $record->status = 'refused';
                    $record->save();
                })->hidden(function ($record) {
                    return !$record->isPending();
                }),
            Action::make('Mark as Completed')
                ->color('success')
                ->icon('heroicon-o-hand-thumb-up')
                ->action(function ($record) {
                    $record->status = 'completed';
                    $record->save();
                })->hidden(function ($record) {
                    return !$record->isAccepted();
                }),
        ];
    }
}
