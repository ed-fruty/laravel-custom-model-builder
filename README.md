Custom Model Query Builder For Laravel 4
============================


Sometimes we need to extends basic query builder.
Of course scopes decide many our problems, but they can't return value.
For example we need to use caching query, but we must calculate/read from config/db caching time. 
Write it in every cahing query is not good choise. So we can define custom query builder. So, do it.

#Installation 

1. Install package via composer
  
  ```bash
  composer require "ed-fruty/laravel-custom-model-builder": "1.0.0"
```

2. Add the service provider in `app/config/app.php`:

  ```bash
  'Fruty\LaravelModelBuilder\LaravelModelBuilderServiceProvider',
```
3. Publish package configuration
  
  ```bash
php artisan config:publish ed-fruty/custom-model-builder
```

#Usage

Now, create file `app/ExampleBuilder.php` and put here:
```php
<?php

class ExampleBuilder extends Illuminate\Database\Eloquent\Builder
{
  public function cacheIt()
  {
    static $cacheTime;
    if (! $cacheTime) {
      $cacheTime = Config::get('someting.where.cache.time.saved');
    }
    
    return $this->getModel()
      ->remember($cacheTime)
      ->first();
  }
}
```

Now register out ExampleBuilder, edit confiiguration file `app/config/ed-fruty/custom-model-builder/main.php`, set `builderClass` to `ExampleBuilder`
Create any test model (or use existing)

```php
class MyModel extends Eloquent
{
  // redeclare builder by using trait
  use Fruty\LaravelCustomBuilder\CustomBuilderTrait;
}
```


Now we can use it.

```php
$result = MyModel::where('id', 5)->cacheIt();
```
