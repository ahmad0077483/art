<?php


namespace App\Hellper\Cart;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Static_;

/**
 * Class Cart
 * @package App\Hellper\Cart
 * @method static bool has($id)
 * @method static collection all();
 * @method static array get($id);
 * @method static Cart put(array $value ,Model $obj=null);
 * @method Static Cart flush();
 * @method Static Cart instance();
 * @method static Cart getDiscount();
 */

class Cart extends Facade
{
protected static function getFacadeAccessor()
{
     return 'cart';
}
}
