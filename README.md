# Laravel - My Blog

## Versions
- PHP 8.2.0
- Laravel 10.6.2
- MariaDB 10.4.27
- Apache 2.4

## Dependencies
- Livewire 2.12
- Laravel Tagging

## Default Settings

### Database MariaDB
- Username: root
- Password:
- PORT: 3306

### Laravel Project
- Project Username: admin@gmail.com
- Project Password: Demos@12

# Run the Project
- Create a database name called "my_blog"
- use .env.example file and rename to .env and configure with above default settings
- composer update
- php artisan migrate --seed
- To login => visit /login using above credentials


# Conclusion
- Only done part related to POST model 
- CRUD operation is done
- Created components for index, edit and create page.
- Livewire need Turbolinks for SPA at the end of project
- Decided to recheck and restart all the courses related to Livewire from scratch and will do another project on it
