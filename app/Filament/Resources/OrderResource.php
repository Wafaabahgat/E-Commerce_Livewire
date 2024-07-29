<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Number;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required()
                            ->preload(),

                        Select::make('brand_id') // إضافة حقل brand_id
                            ->label('Brand')
                            ->relationship('brand', 'name')
                            ->searchable()
                            ->required()
                            ->preload(),


                        Select::make('payment_method')
                            ->options([
                                'stripe' => 'Stripe',
                                'cod' => 'Cash or Delivery'
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed'
                            ])
                            ->default('pending')
                            ->required(),

                        ToggleButtons::make('status')
                            ->options([
                                'new' => 'New',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'canceled' => 'Canceled',
                            ])
                            ->default('new')
                            ->required()
                            ->inline()
                            ->colors([
                                'new' => 'info',
                                'processing' => 'warning',
                                'shipped' => 'success',
                                'delivered' => 'success',
                                'canceled' => 'danger',
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'processing' => 'heroicon-m-arrow-path',
                                'shipped' => 'heroicon-m-truck',
                                'delivered' => 'heroicon-m-check-badge',
                                'canceled' => 'heroicon-m-x-circle',
                            ]),

                        Select::make('currency')
                            ->options([
                                'inr' => 'INR',
                                'usd' => 'USD',
                                'eur' => 'EUR',
                                'gbp' => 'GBP',
                            ])
                            ->default('inr')
                            ->required(),

                        Select::make('shipping_method')
                            ->options([
                                'fedex' => 'FedEx',
                                'ups' => 'UPS',
                                'dhl' => 'DHL',
                                'usps' => 'USPS',
                            ])
                            ->default('fedex')
                            ->required(),

                        Textarea::make('notes')
                            ->columnSpanFull(),

                    ])->columns(2),

                    Section::make('Order Items')->schema([
                        Repeater::make('orderItems')->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('products', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->reactive()
                                    ->afterStateUpdated(fn (
                                        $state,
                                        Set $set
                                    ) => $set('unit_amount', Product::find($state)?->price ?? 0))
                                    ->afterStateUpdated(fn (
                                        $state,
                                        Set $set
                                    ) => $set('total_amount', Product::find($state)?->price ?? 0))
                                    ->columnSpan(4),

                                TextInput::make('quantity')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->reactive()
                                    ->afterStateUpdated(fn (
                                        $state,
                                        Set $set,
                                        Get $get
                                    ) => $set('total_amount', $state * $get('unit_amount')))
                                    ->columnSpan(2),

                                TextInput::make('unit_amount')
                                    ->required()
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),

                                TextInput::make('total_amount')
                                    ->required()
                                    ->numeric()
                                    ->dehydrated()
                                    ->columnSpan(3),
                            ])->columns(12),

                        Placeholder::make('grand_total_placeholder')
                            ->label('Grand Total')
                            ->content(function (Get $get) {
                                $total = 0;
                                $orderItems = $get('orderItems');
                                if ($orderItems) {
                                    foreach ($orderItems as $item) {
                                        $total += $item['total_amount'] ?? 0;
                                    }
                                }
                                return Number::currency($total, 'INR');
                            }),
                    ]),

                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->numeric()
                    ->searchable()
                    ->money('INR'),

                TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('payment_status')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('currency')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('shipping_method')
                    ->sortable()
                    ->searchable(),

                SelectColumn::make('status')->options([
                    'new' => 'New',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'canceled' => 'Canceled',
                ])
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            AddressRelationManager::class
        ];
    }


    public static function getNavigationsBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationsBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
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