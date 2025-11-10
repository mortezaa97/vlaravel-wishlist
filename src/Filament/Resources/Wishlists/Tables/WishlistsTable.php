<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Filament\Resources\Wishlists\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class WishlistsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \App\Filament\Components\Table\UserTextColumn::create(),
                \App\Filament\Components\Table\ModelTextColumn::create(),
                \App\Filament\Components\Table\ModelTypeTextColumn::create(),
                \Filament\Tables\Columns\TextColumn::make('ip')->searchable(),
                \App\Filament\Components\Table\CreatedByTextColumn::create(),
                \App\Filament\Components\Table\UpdatedByTextColumn::create(),
                \App\Filament\Components\Table\CreatedAtTextColumn::create(),
                \App\Filament\Components\Table\UpdatedAtTextColumn::create(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->iconButton()->tooltip('ویرایش'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
