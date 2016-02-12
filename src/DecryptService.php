<?php
namespace Oleander29\Decrypt;

use Illuminate\Support\Facades\Crypt;
class DecryptService{

    protected $encryptable_array;

    public function __construct(){
        $this->encryptable_array = null;

    }

    public function modelDecrypterCallback($array){

        $new_array = [];

        foreach($array as $key => $value){
            if(in_array($key, $this->encryptable_array)){

                $new_array[$key] = Crypt::decrypt($value);
            }
            else{
                $new_array[$key] = $value;
            }
        }

        return $new_array;

    }

    public function collectionDecrypterCallback($array){

        $new_array = [];
        foreach($array as $value){
           $new_array[] = $this->modelDecrypterCallback($value);
        }


        return $new_array;

    }



    public function collection($collection){

        $this->encryptable_array =  $collection->first()->getEncryptable();
        $array = $collection->toArray();
        return $this->collectionDecrypterCallback($array);



    }

    public function model($model){
        $this->encryptable_array = $model->getEncryptable();

        return $this->modelDecrypterCallback($model);

    }



}