<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Routes of tasks
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


    //Routes of categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


    //Routes of material
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');


    //Routes of bugdet
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::get('/budgets/{bugdet}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::get('/budgets/{bugdet}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
    Route::put('/budgets/{bugdet}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{bugdet}', [BudgetController::class, 'destroy'])->name('budgets.destroy');


    //Routes of professionals
    Route::get('/professionals', [ProfessionalController::class, 'index'])->name('professionals.index');
    Route::get('/professionals/create', [ProfessionalController::class, 'create'])->name('professionals.create');
    Route::post('/professionals', [ProfessionalController::class, 'store'])->name('professionals.store');
    Route::get('/professionals/{professional}', [ProfessionalController::class, 'show'])->name('professionals.show');
    Route::get('/professionals/{professional}/edit', [ProfessionalController::class, 'edit'])->name('professionals.edit');
    Route::put('/professionals/{professional}', [ProfessionalController::class, 'update'])->name('professionals.update');
    Route::delete('/professionals/{professional}', [ProfessionalController::class, 'destroy'])->name('professionals.destroy');
});

require __DIR__ . '/auth.php';
