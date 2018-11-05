Inspired in brian2694/laravel-toastr.

A simple plugin to display a material concept toast (alert message) for laravel


# mdtoast-laravel


### install

Using Composer

    composer require amirardakani/mdtoast

### Laravel >= 5.5

That's it! The package is auto-discovered on 5.5 and up!

### Laravel <= 5.4

Add the service provider to `config/app.php`

```php
Amirardakani\\MaterialToast\\ToastServiceProvider::class,
```

Optionally include the Facade in config/app.php if you'd like.

```php
'Toast'  => Amirardakani\\MaterialToast\\Facades\\Toast::class,
```


### Options

You can see [Material-Toast documentation](https://github.com/dmuy/Material-Toast) to custom your need.

* Toast::info('message', 'duration: 10000');


### Basic


* Toast::info('message', 'options');

* Toast::success('message', 'options');

* Toast::warning('message', 'options');

* Toast::error('message', 'options');

* Toast::clear();

* Toast()->info('message', 'options');

```php
<?php

Route::get('/', function () {
    Toast::success('Messages in here');

    return view('welcome');
});
```

Then

You should add `{!! Toast::message() !!}` to your html.

```html
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/dmuy/Material-Toast/454e0a2/mdtoast.min.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/dmuy/Material-Toast/454e0a2/mdtoast.min.js"></script>
        {!! Toast::message() !!}
    </body>
</html>
```



### MIT