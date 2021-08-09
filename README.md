# Парсинг новостей
В данном проекте используется Lumen 8 с использованием IoC. Данный подход подразумевает гибкость и чистоту кода.

## Структура проекта
Здесь указаны основные моменты не существующие изначально при создании приложения Lumen.

```App\Http\Controllers\Api\NewsController.php``` - основной контроллер для выдачи данных

```App\Http\Requests\News\GroupNewsRequest.php``` - файл валидации группировки

```App\Http\Repositories\Interfaces``` - интерфейсы для репозиториев

```App\Http\Repositories``` - репозитории: работа с базой данных. Получение, запись данных в базу данных

```App\Http\Repositories\NewsRepository.php``` - методы для работы с моделью новостей

```App\Http\Repositories\SourceRepository.php``` - методы для работы с моделью источников

```App\Http\Repositories\TagsRepository.php``` - методы для работы с моделью тегов

```App\Http\Services\Interfaces``` - интерфейсы для сервисов

```App\Http\Services``` - сервисы: логика работы и обращения к репозиториям

```App\Http\Services\NewsService.php``` - сервис для работы с новостями

```App\Http\Services\ParsingService.php``` - сервис для работы с парсингом

```App\Providers\IocServiceProvider.php``` - сервис провайдер для подключения сервисов

```App\Providers\RepositoryServiceProvider.php``` - сервис провайдер для подключения репозиториев

```App\Jobs\ParseJob.php``` - задача для парсинга новостей

```routes\api.php``` - роут для апи


## Запуск проекта
Заполните данными конфигурационный файл, выполните миграцию, а затем выполните команду ```php artisan db:seed --class=TagsSeed```

Для вызова вывода новостей откройте url:  ```/api/news```

Для старта парсинга используйте команду: ```php artisan schedule:run```

Для группировки используйте параметр ```groupBy``` со значениями: ```tag``` или ```sourсe``` или ```date``` 

Пример url с группировкой ```/api/news?groupBy=tag```
