# Subtype (Laravel)
 
 The Subtype trait is to split a database table into different models based on a column and it's value.

 To use the trait you have to specify which column and what it's value is with the following attributes:

```
 use HeppyEkberg\Subtype\Subtype;

 public $subtypeColumn = 'COLUMN_NAME';
 public $subtypeValue = 'COLUMN_VALUE';
```


### Composer:

```
  "require": {
    "heppyekberg/subtype-laravel": "^1"
  },
  "repositories": [
    { "type": "vcs", "url": "https://github.com/HeppyEkberg/subtype-laravel.git" }
  ],
```