Вот оформленная, структурированная и очищенная от дублей инструкция по использованию набора команд для генерации CRUD в Laravel.

---

# 🧩 Генерация CRUD‑кода из существующей БД (Laravel)

Набор из **11 Artisan-команд** позволяет полностью реконструировать приложение (миграции, модели, фабрики, сидеры, контроллеры и Blade-представления) на основе структуры вашей текущей базы данных.

> ✅ **Совместимость:** PHP 8.1+ | Laravel 10, 11, 12.
> ⚠️ **Внимание:** Не запускайте сгенерированные миграции (`migrate`) на живой БД, чтобы избежать ошибок дублирования таблиц.

---

## 📦 Список команд и их назначение

| # | Команда | Результат работы |
| --- | --- | --- |
| 1 | `php artisan make:db-check` | **Диагностика:** проверка БД, версий ПО и прав на запись. |
| 2 | `php artisan make:db-clean-project` | **Очистка:** удаление CRUD-файлов и сброс меню/маршрутов. |
| 3 | `php artisan make:db-all` | **Комбайн:** запуск всех генераторов (пп. 4-10) в один клик. |
| 4 | `php artisan make:db-model` | Модели с `$fillable`, `$casts` и связями (`BelongsTo`, `HasMany`). |
| 5 | `php artisan make:db-factory` | Фабрики с умным подбором методов Faker под типы полей. |
| 6 | `php artisan make:db-seeder` | Сидеры (заготовки для вызова фабрик). |
| 7 | `php artisan make:db-controller` | Web-контроллеры (Resource) + Form Requests для валидации. |
| 8 | `php artisan make:db-api-controller` | API-контроллеры + API Requests (возврат JSON). |
| 9 | `php artisan make:db-views` | Blade-шаблоны: `index`, `create`, `edit`, `show`, `_fields`. |
| 10 | `php artisan make:db-migration` | Файлы миграций, полностью описывающие текущую схему таблиц. |
| 11 | `php artisan make:db-create-user` | Утилита для быстрого создания/обновления администратора. |

---

## 🚀 Быстрый старт

### 1. Подготовка

Разместите файлы команд в директории: `app/Console/Commands/DB/`.

Убедитесь, что в каждом файле указан корректный namespace:

`namespace App\Console\Commands\DB;`

### 2. Диагностика системы

Перед началом генерации убедитесь, что всё настроено верно:

```bash
php artisan make:db-check

```

### 3. Полная генерация

Создать весь CRUD для всех таблиц (с перезаписью существующих файлов):

```bash
php artisan make:db-all --force

```

---

## 🛠 Примеры использования параметров

**Для конкретной таблицы:**

```bash
php artisan make:db-all --table=products --force

```

**Пропуск ненужных таблиц:**

```bash
php artisan make:db-all --skip=logs,backups,temp_data

```

**Использование другого подключения (например, PostgreSQL):**

```bash
php artisan make:db-all --connection=pgsql

```

**Очистка проекта перед повторной генерацией:**

```bash
php artisan make:db-clean-project --force

```

---

## 🧠 Принципы работы генераторов

| Компонент | Логика генерации |
| --- | --- |
| **Связи (Relations)** | Автоматическое определение `BelongsTo` (если в таблице есть FK) и `HasMany` (если на таблицу ссылаются другие). Поддержка Pivot-таблиц для `BelongsToMany`. |
| **Валидация** | Создание `CreateRequest` и `UpdateRequest` с правилами на основе типов колонок (string, integer, date) и атрибута `nullable`. |
| **Интерфейс** | Генерация Blade-форм. Поля типа `text` превращаются в `textarea`, `boolean` в `checkbox`, `date` в соответствующие инпуты. |
| **Faker** | Поля `email`, `phone`, `address`, `image` в фабриках автоматически связываются с соответствующими методами библиотеки Faker. |

---

## 📂 Структура создаваемых файлов

Генератор строго следует стандартам Laravel:

* **Модели:** `app/Models/`
* **Контроллеры:** `app/Http/Controllers/` (API в `app/Http/Controllers/API/`)
* **Валидация:** `app/Http/Requests/`
* **Миграции:** `database/migrations/`
* **Шаблоны:** `resources/views/{table_name}/`

---

## ⚠️ Системные исключения

Команды автоматически игнорируют служебные таблицы Laravel, такие как:
`migrations`, `failed_jobs`, `password_reset_tokens`, `sessions`, `cache`, `personal_access_tokens`.

---

## 🧪 Типовой процесс работы

1. **Проверка:** `php artisan make:db-check` (проверка связи с БД).
2. **Очистка (опционально):** `php artisan make:db-clean-project` (если нужно начать с чистого листа).
3. **Генерация:** `php artisan make:db-all --table=orders` (создание кода для конкретной бизнес-логики).
4. **Финальный штрих:** `php artisan make:db-create-user --email=admin@test.com` (создание доступа в админку).

---

*Инструкция актуальна для версии генератора 2026.05.*
