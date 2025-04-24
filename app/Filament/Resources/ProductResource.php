<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $navigationGroup = 'Inventori';
    
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                Tables\Columns\TextColumn::make('stock')->sortable(),
                Tables\Columns\TextColumn::make('price')->money('IDR')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->visible(fn () => auth()->check() && auth()->user()->role === 'admin'),
                Tables\Actions\DeleteAction::make()->visible(fn () => auth()->check() && auth()->user()->role === 'admin'),
                Action::make('print')
                    ->label('Print Stock')
                    ->icon('heroicon-o-printer')
                    ->url(fn (Product $record): string => route('print.stock', $record->id))
                    ->openUrlInNewTab()
                    ->visible(fn () => auth()->check() && auth()->user()->role === 'kepala_gudang'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(fn () => auth()->check() && auth()->user()->role === 'admin'),
            ])
            ->headerActions([
                Action::make('print_all')
                    ->label('Print All Stocks')
                    ->icon('heroicon-o-printer')
                    ->url(fn (): string => route('print.all.stocks'))
                    ->openUrlInNewTab()
                    ->visible(fn () => auth()->check() && auth()->user()->role === 'kepala_gudang'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

}