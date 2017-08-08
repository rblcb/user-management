## Laravel 4 Simple user management system

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Running application
After cloning the repository, navigate to project folder, open your terminal and run command:
```
php artsan serve
```

You should see a message saying something like:
```
Laravel development server started on http://localhost:8000
```

Now navigate to <a href="http://localhost:8000" target="_blank">http://localhost:8000</a> and you should see home page

## SQLite database
Since default settings are set to use SQLite database, there is no need to setup anything regarding the database.

## Admin credentials
* Username:
```
admin
```
* Password:
```
secret
```
For other users the password is same as for the admin.

## Migration and seeding
To refresh migrations and reseed database please run this command:
```
php artisan migrate:refresh --seed
```

This will refresh tables and seed the tables.