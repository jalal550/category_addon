<?php



use App\Addons\Category\Http\Controllers\CategoryController;

Route::group(['namespace' => 'App\Addons\Category\Http\Controllers'], function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
