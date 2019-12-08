MySql editor extension for laravel-admin based on code-mirror
======

## Installation 

```bash
composer require vyordels/mysql-editor

php artisan vendor:publish --tag=laravel-admin-code-mirror
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```mysql

    'extensions' => [

        'mysql-editor' => [
        
            //Set to false if you want to disable this extension
            'enable' => true,
            
            // Editor configuration
            'config' => [
                
            ]
        ]
    ]

```

The configuration of the editor can be found in  [CodeMirror Documentation](https://codemirror.net/)

## Usage 

Use it in the form:
```mysql
$form->mysql('code');
```

Set height
```mysql
$form->mysql('code')->height(500);
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
