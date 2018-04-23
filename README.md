# Timecard
Laravel-based timecard application. 

### What is this?

Timecard is a [Laravel](https://laravel.com)-based application for managing personal time cards.

#### Notes

- [Laravel Passport](https://laravel.com/docs/5.6/passport) is used for authenticating API calls.

### Features

- Artisan command to generate a user (handy for organizations that just need to create users internally without exposing a registration form)
- API (Coming soon)

### Setup

1. Run `php artisan key:generate` to generate the application key
2. Install Passport (`php artisan passport:install`) to create some client IDs

### Artisan Commands

#### `user:create`
Create a user without going through the registration flow. Will prompt for name, username, password, and email address
