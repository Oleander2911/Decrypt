<?php

namespace Oleander29\Decrypt\Src;

use Illuminate\Support\Facades\Facade;

class DecryptServiceFacade extends Facade{


    protected static function getFacadeAccessor() {return 'decrypt';}
}