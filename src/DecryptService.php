<?php
namespace Oleander\Decrypt\Src;

use Illuminate\Support\Facades\Crypt;
class DecryptService{

    protected $encryptable_array;

    public function __construct(){
        $this->encryptable_array = null;

    }

    public function modelDecrypterCallback($value, $key){
        if(in_array($key, $this->encryptable_array)){

            return Crypt::decrypt($value);
        }
        else{
            return $value;
        }

    }

    public function collectionDecrypterCallback($array){

        return array_map(array($this, 'modelDecrypterCallback'), $array, array_keys($array));

    }



    public function collection($collection){

        $this->encryptable_array =  $collection->first()->getEncryptable();
        $array = $collection->toArray();
        return array_map(array($this, 'collectionDecrypterCallback'), $array);



    }

    public function model($model){
        $this->encryptable_array = $model->getEncryptable();

        return array_map(array($this, 'modelDecrypterCallback'), $model, array_keys($model));

    }



}