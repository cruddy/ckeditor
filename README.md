A [CKEditor](http://ckeditor.com) for [Cruddy](http://github.com/lazychaser/cruddy).

## Installation

```
composer require cruddy/ckeditor:dev-master@dev
```

Include a service provider:

```php
'Kalnoy\Cruddy\CKEditor\CKEditorServiceProvider',
```

Publish assets:

```
php artisan asset:publish cruddy/ckeditor
```

## Usage

```php
$schema->ckedit('description');
```