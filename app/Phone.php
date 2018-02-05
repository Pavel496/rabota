<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Phone
 *
 * @package App
 * @property string $phone
 * @property string $code
 * @property tinyInteger $status
 * @property string $created_by
*/
class Phone extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['phone', 'code', 'status', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
