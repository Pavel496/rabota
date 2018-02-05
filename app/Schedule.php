<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Schedule
 *
 * @package App
 * @property string $title
 * @property string $slug
*/
class Schedule extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug'];
    
    
    
}
