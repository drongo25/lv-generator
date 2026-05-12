app/Console/Commands/DB/MakeDbCheckCommand.php

# Перед любым генератором — запустить проверку
php artisan make:db-check

# Для другого соединения
php artisan make:db-check --connection=pgsql

# Потом генерировать всё
php artisan make:db-all --force

# Или по одной таблице
php artisan make:db-check
php artisan make:db-all --table=orders --force




# Очистить кэш провайдеров
php artisan config:clear
php artisan cache:clear

# Убедиться что команды появились
php artisan list | grep make:db

# Должно вывести:
#  php artisan make:db-check
#  php artisan make:db-migration
#  php artisan make:db-model
#  php artisan make:db-seeder
#  php artisan make:db-factory
#  php artisan make:db-controller
#  php artisan make:db-api-controller
#  php artisan make:db-views
#  php artisan make:db-all

# Запустить диагностику
php artisan make:db-check



# Пример схемы БД:

    users       (id, name, email)
    posts       (id, user_id→users, category_id→categories)
    comments    (id, post_id→posts, user_id→users)
    categories  (id, name)
    role_user   (user_id→users, role_id→roles)   ← pivot
    roles       (id, name)

# Результат в User.php:

    php// belongsTo — нет (у users нет FK)
    
    // hasMany — другие таблицы ссылаются на users
    public function posts(): HasMany      // posts.user_id → users
    public function comments(): HasMany   // comments.user_id → users
    
    // belongsToMany — через pivot role_user
    public function roles(): BelongsToMany

# Результат в Post.php:

    php// belongsTo — posts имеет FK
    public function user(): BelongsTo       // posts.user_id → users
    public function category(): BelongsTo  // posts.category_id → categories
    
    // hasMany
    public function comments(): HasMany    // comments.post_id → posts
