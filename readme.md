Для начала нужно будет установить Docker Desktop.

Ставим проект и прописываем cd src в командную строку, далее нужно будет запустить команду composer install для установки зависимостей laravel.

Далее нужно будет забилдить проект через docker-compose build, после чего запустить docker-compose up -d для того чтобы поднять контейнеры.

Если все прошло успешно, вы можете перейти по ссылке: http://localhost:9090 , ввести Логин:root Пароль:root и добавить базу данных fuche_db вручную.

Далее переходите на localhost:80 и начните миграции базы данных.

Чтобы добавить данные в базу данных воспользуйтесь командой php artisan php artisan db:seed --class=NotebookSeeder.

Далее меняем в .env параметр DB_HOST на mysql(название контейнера в докере, иначе не будет работать).

Если будет ошибка SQLSTATE[HY000] [2002] No such file or directory, то используем команду php artisan config:clear.

Для теста API используйте php artisan test, но обязательно меняйте в .env DB_HOST на localhost, для того чтобы laravel смог подключиться к базе данных. Ошибка в методе store это баг, на самом деле запись добавляется, можете сами проверить).

localhost/api/documentation Swagger-документация всех методов API.

localhost/api/v1/notebook Вывод всех записей Notebook.

localhost/api/v1/notebook/{notebook} Вывод одной записи Notebook.

