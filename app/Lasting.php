<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lasting
 *
 * @package App
 * @property string $lasting
 * @property string $slug
*/
class Lasting extends Model
{
    use SoftDeletes;

    protected $fillable = ['lasting', 'slug'];
    
    
    
}
