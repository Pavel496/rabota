<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Experience
 *
 * @package App
 * @property string $title
 * @property string $slug
*/
class Experience extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug'];
    
    
    
}
