A [CKEditor](http://ckeditor.com) for [Cruddy](http://github.com/lazychaser/cruddy).

## Installation

```
composer require cruddy/ckeditor:0.5.*@dev
```

Include a service provider:

```php
'Kalnoy\Cruddy\CKEditor\CKEditorServiceProvider',
```

Publish assets:

```
php artisan vendor:publish --tag="public"
```

## Usage

```php
$schema->ckedit('description');
```

Providing configuration:

```php
$schema->ckedit('description')->config([
    'skin' => 'myskin,/myskin/',
]);
```