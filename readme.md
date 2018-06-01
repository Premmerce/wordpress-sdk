# Premmerce Wordpress SDK

## FileManager

File manager is responsible for plugin resources(assets, views, paths) management.
Class should be initialized with plugin main file full path as parameter.

params:
   * string $mainFile - main plugin file path
   * string $templatePath - theme directory to override plugin templates located in `frontend` directory
   
```php
    $fileManager = new FileManager($mainFile);
    
    //V2
    $fileManager = new FileManager($mainFile, $templatePath);
```

### includeTemplate

includeTemplate(string $template, array $variables = [])

params:
    * string $template - relative path to file
    * array $variables - array of variables used in template file
    
Includes template located in plugin `views` folder with passed variables in scope


```php

$fileManager->includeTemplate('admin/index.php',['title' => 'My title']);

```

### renderTemplate

renderTemplate(string $template, array $variables = [])

params:
    * string $template - relative path to file
    * array $variables - array of variables used in template file
    
Returns rendered template located in plugin `views` folder with passed variables in scope


```php

$rendered = $fileManager->includeTemplate('admin/index.php',['title' => 'My title']);

```

### locateAsset

locateAsset(string $file)

Returns asset url located in plugin `assets` folder 
params:
    * string $template - relative path to file
    

```php

$url = $fileManager->locateAsset('admin/css/style.css');

wp_enqueue_style('my_style', $fileManager->locateAsset('front/css/style.css'));

```