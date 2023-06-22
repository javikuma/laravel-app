# Laravel App Quick Guide

## Installation

1. Clone the repository
2. Run `composer install`
3. Run `php artisan migrate`
4. Run `php artisan serve`

## Usage

1. Go to `http://localhost:8000/` in your browser

## CLI

### Create a model

`php artisan make:model ModelName` (add `--migration` for migration)

### Create a controller

`php artisan make:controller ControllerName` (add `--api` for API controller)

### Create a controller with model

`php artisan make:controller ControllerName --model=ModelName`
