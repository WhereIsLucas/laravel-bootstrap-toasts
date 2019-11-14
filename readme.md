# Bootstrap flash messages for your Laravel app 

This package, based on `laracasts/flash` provides an interface for Bootstrap 4.2 toast messages.

## Installation

Get the package with composer
```bash
composer require whereislucas/laravel-bootstrap-toasts
```

If you are not using Laravel 5.5 or higher, include the service provider within your `config/app.php` file.
```php
'providers' => [
    WhereIsLucas\LaravelBootstrapToasts\ToastServiceProvider::class,
];
```

This package is made for Bootstrap 4.2 and higher, be sure to include the css and js files on your page.

```html
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
```
```html
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
```


## Usage

First of all, include the snippet in your Blade templates
```html
@include('laravel-bootstrap-toasts::message')
```

Then, in your controller, call the `toast()` method to create a toast message.

```php
public function edit()
{
    toast('Post edited!');
    return redirect(route('posts.list'));
}
```

The toast method accepts the title and level optional arguments : 
```php
toast('message','level','title')
```

There are a few quick methods to modify the toast:

- `toast('Message')->success()`: Set the toast level as "success".
- `toast('Message')->info()`: Set the toast level as "info".
- `toast('Message')->error()`: Set the toast level as "danger".
- `toast('Message')->warning()`: Set the toast level as "warning".


- `toast('Message')->title("Toast title")`: Set the toast title.
- `toast('Message')->important()`: Add a close button to the toast.

## Configuration & personalization

You can publish the configuration file to tweak the position of the toast or the default value for 'autohide'.
```bash
php artisan vendor:publish --provider="WhereIsLucas\LaravelBootstrapToasts\ToastServiceProvider" --tag="config"
```
You can publish the view and tweak it if you want!
```bash
php artisan vendor:publish --provider="WhereIsLucas\LaravelBootstrapToasts\ToastServiceProvider" --tag="views"
```

