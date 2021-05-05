# **PHP Router** (under construction)

This repository contains routing classes that enables you to define your routes similar to laravel 8 routes.

### **Features**
- Define GET/POST routes.
- Named routes.
- Apply middlewares.
- Rendering error views (404 - 405).

### **Usage** 
```php 
use Src\Routing\Route;
use App\Http\Controllers\ProductController;

Route::get('home', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('products', [ProductController::class, 'index'])
    ->name('products.index')
    ->middleware(['test']);

Route::get('products/create', [ProductController::class, 'create'])
    ->name('products.create')
    ->middleware(['test', 'another-test']);

Route::post('products/store', [ProductController::class, 'store'])
    ->name('products.store');
```