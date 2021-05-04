# **PHP Router** (under construction)

This repository contains routing classes that enables you to define your routes similar to laravel 8 routes.

### **Features**
- Define GET/POST routes.
- Named routes.
- Rendering error views (404 - 405).

### **Usage** 
```php 
use Src\Routing\Route;
use App\Http\Controllers\ProductController;

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
```