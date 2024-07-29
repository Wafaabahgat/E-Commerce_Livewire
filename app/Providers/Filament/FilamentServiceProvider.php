<?php

namespace App\Providers;

use App\Filament\Resources\OrderResource;
use Filament\Facades\Filament;

Filament::serving(function () {
    Filament::registerNavigationItems([
        OrderResource::getNavigationItems(),
    ]);
});