# lumen-modules
Make modular lumen framework for make easy teamwork on big projects

### Features

lumen modules is a lumen package which created to manage your large lumen app using modules.
Module is like a lumen package, it has some controllers or models. This package is supported and tested in lumen 8.
This package is a re-published, re-organised and maintained version of [laravel-modules](https://github.com/nWidart/laravel-modules "laravel-modules"), which isn't support lumen officially.

# Install

To install through Composer, by run the following command:

`composer require mbf5923/lumen-modules`
 
 after install complete, load the config and the service provider in `bootstrap/app.php`
 
 	$app->register(Mbf\Modules\LumenModulesServiceProvider::class);

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. so add bellow  code in your composer.json :

	{
  	"autoload": {
    	"psr-4": {
     	 "App\\": "app/",
      	"Modules\\": "modules/"
   	 }
 	 }
	}

### Tip: don't forget to run composer dump-autoload afterwards

for more info and full documentation visit https://nwidart.com/laravel-modules/

### Credits
[Nicolas Widart](https://github.com/nwidart "Nicolas Widart")

### Change To Lumen Support
[Mohammad Baladi](https://github.com/mbf5923 "Mohammad Baladi")

### License
The MIT License (MIT).
