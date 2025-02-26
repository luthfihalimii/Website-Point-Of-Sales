<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Product;
use App\Models\OrderProduct;

class ProductFavorite extends BaseWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Produk Favorit';
    public function table(Table $table): Table
    {
        $productQuery = Product::query()
            ->withCount('orderProducts')
            ->orderByDesc('order_products_count')
            ->take(10);
        return $table
            ->query($productQuery)
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_products_count')
                    ->label('Dipesan')
                    ->searchable(),
            ])->defaultPaginationPageOption(5);
    }
}
