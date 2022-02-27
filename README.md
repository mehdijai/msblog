# MSBlog

MSBlog is blogger CMS created in Laravel.
This Blog with contains:
- Users previliges and roles,
- Newsletters managements,
- SEO friendly,
- Posts, categories and modules,

# Install and start server

1- First, make sure you have MySQL,
2- Edit the credintials of your DB in .env file,
3- Create a database called "msblog1",
4- Execute this command lines:
``` shell
php artisan optimize:clear
php artisan migrate
php artisan db:seed
php artisan serve
```
5- the project will be served in *http://127.0.0.1:8000/*
