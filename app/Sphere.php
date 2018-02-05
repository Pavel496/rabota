<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sphere
 *
 * @package App
 * @property string $title
 * @property string $slug
*/
class Sphere extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug'];
    
    
    
}
