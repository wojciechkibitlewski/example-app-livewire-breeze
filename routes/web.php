<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesSourceController;
use App\Http\Controllers\SalesTypeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ReportsController;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::get('/', function () {
        return view('auth.login');
    })->name('welcome');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/auth.php';

    Route::middleware([
        'auth',
        'verified',
    ])->group(function () {
        
        // dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // reports
        Route::get('reports', [ReportsController::class, 'index'])->name('reports');
        Route::get('reports/sales-category', [ReportsController::class, 'salesCategory'])->name('reports.sales-category');
        Route::get('reports/sales-year-to-year', [ReportsController::class, 'salesYearToYear'])->name('reports.sales-year-to-year');
        Route::get('reports/clients-top', [ReportsController::class, 'clientsTop'])->name('reports.clients-top');

        // todo
        Route::get('todo', [TodoController::class, 'index'])->name('todo');

        // calendar
        Route::get('calendar/schelude', [CalendarController::class, 'schelude'])->name('calendar.schelude');
        Route::get('calendar', [CalendarController::class, 'schelude'])->name('calendar');

        // settings
        Route::get('/settings', function() { 
            return view('settings.home.index');
        })->name('settings');

        // settings. product category
        Route::get('settings/productcategory/index', [ProductCategoryController::class, 'index'])->name('settings.productcategory.index');
        Route::get('settings/productcategory/create', [ProductCategoryController::class, 'create'])->name('settings.productcategory.create');
        Route::post('settings/productcategory/store', [ProductCategoryController::class, 'store'])->name('settings.productcategory.store');
        Route::get('settings/productcategory/show/{id}', [ProductCategoryController::class, 'show'])->name('settings.productcategory.show');
        Route::get('settings/productcategory/edit/{id}', [ProductCategoryController::class, 'edit'])->name('settings.productcategory.edit');
        Route::patch('settings/productcategory/update', [ProductCategoryController::class, 'update'])->name('settings.productcategory.update');
        Route::delete('settings/productcategory/destroy', [ProductCategoryController::class, 'destroy'])->name('settings.productcategory.destroy');
       
        // settings. Sales source
        Route::get('settings/salessource/index', [SalesSourceController::class, 'index'])->name('settings.salessource.index');
        Route::get('settings/salessource/create', [SalesSourceController::class, 'create'])->name('settings.salessource.create');
        Route::post('settings/salessource/store', [SalesSourceController::class, 'store'])->name('settings.salessource.store');
        Route::get('settings/salessource/show/{id}', [SalesSourceController::class, 'show'])->name('settings.salessource.show');
        Route::get('settings/salessource/edit/{id}', [SalesSourceController::class, 'edit'])->name('settings.salessource.edit');
        Route::patch('settings/salessource/update', [SalesSourceController::class, 'update'])->name('settings.salessource.update');
        Route::delete('settings/salessource/destroy', [SalesSourceController::class, 'destroy'])->name('settings.salessource.destroy');

        //settings. Sales type
        Route::get('settings/salestype/index', [SalesTypeController::class, 'index'])->name('settings.salestype.index');
        Route::get('settings/salestype/create', [SalesTypeController::class, 'create'])->name('settings.salestype.create');
        Route::post('settings/salestype/store', [SalesTypeController::class, 'store'])->name('settings.salestype.store');
        Route::get('settings/salestype/show/{id}', [SalesTypeController::class, 'show'])->name('settings.salestype.show');
        Route::get('settings/salestype/edit/{id}', [SalesTypeController::class, 'edit'])->name('settings.salestype.edit');
        Route::patch('settings/salestype/update', [SalesTypeController::class, 'update'])->name('settings.salestype.update');
        Route::delete('settings/salestype/destroy', [SalesTypeController::class, 'destroy'])->name('settings.salestype.destroy');

        // products 
        Route::get('products/index', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/show/{prefix}', [ProductController::class, 'show'])->name('products.show');
        Route::get('products/edit/{prefix}', [ProductController::class, 'edit'])->name('products.edit');
        Route::patch('products/update', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
        
        // clients 
        Route::get('clients/index', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('clients/store', [ClientController::class, 'store'])->name('clients.store');
        Route::get('clients/show/{prefix}', [ClientController::class, 'show'])->name('clients.show');
        Route::get('clients/edit/{prefix}', [ClientController::class, 'edit'])->name('clients.edit');
        Route::patch('clients/update', [ClientController::class, 'update'])->name('clients.update');
        Route::patch('clients/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');

        Route::get('clients/currentMonth', [ClientController::class, 'currentMonth'])->name('clients.currentMonth');
        Route::post('clients/search', [ClientController::class, 'search'])->name('clients.search');

        // lead/sales
        Route::get('leads/index', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('leads/create', [LeadController::class, 'create'])->name('leads.create');
        Route::post('leads/store', [LeadController::class, 'store'])->name('leads.store');
        Route::get('leads/add-client/{prefix}', [LeadController::class, 'addClient'])->name('leads.add-client');
        Route::post('leads/store-client', [LeadController::class, 'storeClient'])->name('leads.store-client');
        Route::get('leads/add-product/{prefix}', [LeadController::class, 'addProduct'])->name('leads.add-product');
        Route::post('leads/store-product', [LeadController::class, 'storeProduct'])->name('leads.store-product');

        Route::get('leads/show/{prefix}', [LeadController::class, 'show'])->name('leads.show');
        Route::post('leads/addproducts', [LeadController::class, 'addProducts'])->name('leads.addProducts');
        Route::patch('leads/update', [LeadController::class, 'update'])->name('leads.update');
        Route::patch('leads/productUpdate', [LeadController::class, 'productUpdate'])->name('leads.productUpdate');
        Route::delete('leads/destroy', [LeadController::class, 'destroy'])->name('leads.destroy');
        Route::delete('leads/productDestroy', [LeadController::class, 'productDestroy'])->name('leads.productDestroy');

        Route::post('leads/search', [LeadController::class, 'search'])->name('leads.search');
        Route::get('leads/currentMonth', [LeadController::class, 'currentMonth'])->name('leads.currentMonth');

    });


});



