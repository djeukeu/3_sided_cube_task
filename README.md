## Requirements

- PHP version of 8.1 or higher.
- A web server such as Apache or Nginx
- A database management system (MySQL)
- Composer as a package manager to manage dependencies
- Have Docker install (`optional`)

## Setup Guidelines

- Install packages, using: `composer install`
- Generate the `.env` file, using: `composer project-setup`
- Lauch the docker container, using: `docker-compose up` or setup a MySQL database and update the credential in `.env` file
- Run the db migration, using: `php artisan migrate`
- Lauch the project, using: `php artisan serve`

## Commands

- Inspect code for style errors: `composer pint`
- Inspect and fix code style errors: `composer pint-fix`
