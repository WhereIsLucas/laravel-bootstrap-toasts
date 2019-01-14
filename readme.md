# Bootstrap flash messages for your Laravel app 

This package, based on `laracasts/flash` provides an interface for Bootstrap 4.2 toast messages.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require whereislucas/laravel-bootstrap-toasts
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    WhereIsLucas\LaravelBootstrapToasts\Toaster::class,
];
```

This package is made for Bootstrap 4.2, be sure to include the css and js files on your page.

```html
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
```
```html
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
```


## Usage

To create a toast message, call the `toast()` method in your controller.

```php
public function edit()
{
    toast('Post edited!');
    return redirect(route('posts.list'));
}
```

The toast method accepts the optionnal arguments title and level: 
```php
toast('message','level','title')
```

There's a few additional quick methods to modify the toast:

- `toast('Message')->success()`: Set the toast level as "success".
- `toast('Message')->info()`: Set the toast level as "info".
- `toast('Message')->error()`: Set the toast level as "danger".
- `toast('Message')->warning()`: Set the toast level as "warning".


- `toast('Message')->title("Toast title")`: Set the toast title.
- `toast('Message')->important()`: Add a close button to the flash message.

To display the toasts in your views, simply add this in your Blade templates

```html
@include('laravel-bootstrap-toasts::message')
```

