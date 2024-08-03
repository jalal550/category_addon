

# Category Addon System

This is a simple Category Addon System for Laravel. It allows you to create, read, update, and delete categories. The system uses Bootstrap for styling.

## Installation

### 1. Clone the Repository

Clone the repository into your Laravel project's `app/Addons` directory.

```bash
git clone <repository-url> app/Addons/Category
```

### 2. Add Service Provider

Add the `CategoryServiceProvider` to the list of service providers in `config/app.php`.

```php
'providers' => [
    // Other Service Providers

    App\Addons.Category.CategoryServiceProvider::class,
],
```

### 3. Publish Configuration and Migrations

Publish the configuration and migration files.

```bash
php artisan vendor:publish --provider="App\Addons\Category\CategoryServiceProvider"
```

### 4. Run Migrations

Run the migrations to create the necessary database tables.

```bash
php artisan migrate
```

## Usage

### 1. Routes

The addon system provides the following routes:

- `GET /categories` - List all categories
- `GET /categories/create` - Show form to create a new category
- `POST /categories` - Store a new category
- `GET /categories/{category}` - Show a single category
- `GET /categories/edit/{category}` - Show form to edit an existing category
- `POST /categories/update/{category}` - Update an existing category
- `POST /categories/destroy/{category}` - Delete an existing category

These routes are defined in `app/Addons/Category/routes/web.php`.

### 2. Controllers

The `CategoryController` handles all the CRUD operations. It is located in `app/Addons/Category/Http/Controllers/CategoryController.php`.

### 3. Views

The views for the Category addon are located in `app/Addons/Category/views`. They are as follows:

- `index.blade.php` - Lists all categories
- `create.blade.php` - Form to create a new category
- `edit.blade.php` - Form to edit an existing category
- `show.blade.php` - Show a single category

### 4. Models

The `Category` model is used to interact with the categories table in the database. It is located in `app/Addons/Category/Models/Category.php`.

### 5. Using Named Routes

In your views and controllers, you can use the named routes for better maintainability:

- `route('categories.index')` - Lists all categories
- `route('categories.create')` - Shows the form to create a new category
- `route('categories.store')` - Stores a new category
- `route('categories.show', $category->id)` - Shows a single category
- `route('categories.edit', $category->id)` - Shows the form to edit an existing category
- `route('categories.update', $category->id)` - Updates an existing category
- `route('categories.destroy', $category->id)` - Deletes an existing category

## File Structure

```plaintext
app/
└── Addons/
    └── Category/
        ├── Http/
        │   ├── Controllers/
        │   │   └── CategoryController.php
        │   └── routes/
        │       └── web.php
        ├── Models/
        │   └── Category.php
        ├── Providers/
        │   └── CategoryServiceProvider.php
        └── views/
            ├── index.blade.php
            ├── create.blade.php
            ├── edit.blade.php
      |      └── show.blade.php

      └── migrations/
        └── 2024_08_03_000000_create_categories_table.php



## License

This addon is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
