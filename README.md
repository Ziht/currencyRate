Курсы валют

Установка проекта<br/>
Необходимо установить следующий софт: git, php5, nginx, php5-fpm, redis-server<br/>
а так же необходимые php расширения, например: php5-cli php5-common php5-mysql php5-gd php5-cgi php-pear php5-mcrypt<br/>
Копируем проект, например так:<br/>
git clone git://github.com/Ziht/currencyRate.git {project_dir}<br/>
Желательно создать символическую ссылку в /var/www/{project_name}.<br/>
Теперь настраиваем nginx и php-fpm, как это сделать, можно прочитать например на этом сайте http://help.ubuntu.ru/wiki/nginx-phpfpm<br/>
Скачиваем ZendFramework-1.12.13. Теперь осталось только прописать в application.ini переменную includePaths.library где будет указан путь до ваших библиотек.<br/>

В качестве выбранного стандарта кодирования использовался PSR1/PSR2
