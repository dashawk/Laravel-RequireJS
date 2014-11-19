Laravel-RequireJS
=================

Laravel package to automatically create files for RequireJS. This is for my personal use but if there is anyone who wants to use this package, feel free to fork it.

Installation
===============

Install the package using composer. Edit your `composer.json` file and require this.
```json
"panugaling/require-js": "dev-master"
```

Next is to update `composer` from the terminal.
```cli
composer update
```

Let's now add the `Service Provider` by opening your `app/config/app.php` and add a new item in the providers array.
```json
'Panugaling\RequireJS\RequireJSServiceProvider',
```

If you want to change the configuration of the package, type this command in the terminal.
```cli
php artisan config:publish panugaling/require-js
```

That's it! You are now ready to use the package.

Usage
=====

In your blade template, you can use it like this.
```html
<body>
	{{ Required::load('main') }}
</body>
```
The argument `main` is the filename of our main js file. you can change it what ever you like.