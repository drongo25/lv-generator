### 1 создаем в папке D:\OSP\home\ папку с проектом laravel.loc

    D:\OSP> cd home
    D:\OSP\home\> mkdir laravel.loc
    D:\OSP\home\laravel.loc

### 2 Запускаем консоль сервера D:\OSP>
### если несколько PHP тогда консоль нужного модуля PHP

### 3 переходим в папку laravel.loc

    D:\OSP> cd home
    D:\OSP\home> cd laravel.loc

### 4 устанавливаем laravel  D:\OSP\home\laravel.loc>

    composer create-project laravel/laravel .
    composer create-project --prefer-dist laravel/laravel .
    composer create-project --prefer-dist laravel/laravel:^10.* .

### 5 создаем в D:\OSP\home\laravel.loc папку .osp

    home\laravel.loc\.osp

### 6 создаем файл project.ini

    [laravel.loc]
    php_engine  = PHP-8.3
    project_dir = {base_dir}
    project_url = https://{host_decoded}
    public_dir  = {base_dir}\public
    ssl         = on
    node_engine = Node-20.14.0

### 7 перезапускаем сервер

### 8 если надо использовать MySQL в файле .env

    # DB_CONNECTION=sqlite
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3307
    DB_DATABASE=lv_api
    DB_USERNAME=root
    DB_PASSWORD=root

### 9 запускаем миграции

    php artisan migrate

    php artisan migrate:fresh --seed
    php artisan migrate:fresh --seed

### Change password /changepassword

```php

    Route::get('changepassword', function() {
    
    $user = App\Models\User::where('email', 'admin@lv-hotel.loc')->first();
    $user->password = Hash::make('123456');
    $user->save();
    
    echo 'Password changed successfully.';
    
    });
    
    $user = App\User::where('email', 'admin@lv-hotel.loc')->first();
    $user->password = Hash::make('123456');
    $user->save();
    
    App\User::where('email', 'admin@lv-hotel.loc')->first()->update(['123456'=>Hash::make('123456')]);
```

## Установка DBAL
  ```bash
    composer require  --dev barryvdh/laravel-debugbar
  ```
## Установка Laravel IDE Helper Generator

```bash
    composer require --dev barryvdh/laravel-ide-helper
```

## Установка debugbar

```bash
    composer require --dev barryvdh/laravel-debugbar
```

## Установка laravel/breeze

```bash
    composer require laravel/breeze --dev
```

```bash
    php artisan breeze:install
    npm install
    npm run dev
    php artisan migrate
```

```bash
    php artisan breeze:install vue
    npm install
    npm run dev
    php artisan migrate
```
