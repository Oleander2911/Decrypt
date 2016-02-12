# Decrypt

This is a little laravel package which takes a collection or an Eloquent model and decrypts the fields of either every model in the collection which are defined in the $encryptable variable in your model(read below), it returns the model og collection as an array, so it is mostly usable when wanting to return some json, all you need to do is encode it.

## Installation

To install just add this to your composer.json "oleander29/decrypt": "dev-master"
then run composer update.


After this add the service provider to the config/app.php file like so Oleander29\Decrypt\DecryptServiceProvider::class

And lastly add an alias in the same file(config/app.php) like so 'Decrypt' => 'Oleander29\Decrypt\DecryptServiceFacade'

Remember to add a variable to your model so the package can see what fields in can decrypt and what it should not, you need to add the following variable: 

protected $encryptable = [
        'field1',
        'field2',
    ];


To use the decrypter and it's functions just add use Decrypt; on top of your file, and you can then use the following functions like so:

- Decrypt::collection($collection);
- Decrypt::model($model);
