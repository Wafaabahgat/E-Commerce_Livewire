<?php

use App\Livewire\Auth\ForgotPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailsPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Filament\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);

/////////////////////// Auth ///////////////////////
Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);
Route::get('/forgot', ForgotPage::class);
Route::get('/reset-password', ResetPasswordPage::class);
Route::get('/success', SuccessPage::class);
Route::get('/cancel', CancelPage::class);


Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/checkout', CheckPage::class);
Route::get('/my-orders', MyOrdersPage::class);
Route::get('/my-orders/{order}', MyOrderDetailsPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);