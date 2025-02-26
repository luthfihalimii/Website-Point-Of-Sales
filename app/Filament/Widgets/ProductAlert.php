<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Product;

class ProductAlert extends BaseWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Produk hampir habis';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()->where('stock', '<=', 10)->orderBy('stock', 'asc')
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->color(static function ($state): string {
                        if ($state < 5) {
                            return 'danger';
                        } elseif ($state <= 10) {
                            return 'warning';
                        }
                    })
                    ->sortable()
            ])
            ->defaultPaginationPageOption(5);
    }
}
