<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Company
 *
 * @package App
 * @property string $name
 * @property text $describition
 * @property string $address
 * @property string $site
 * @property string $phone
 * @property string $contacts
 * @property string $rating
 * @property string $moder_checking
 * @property string $created_by
*/
class Company extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['name', 'describition', 'address', 'site', 'phone', 'contacts', 'rating', 'moder_checking', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function sphere()
    {
        return $this->belongsToMany(Sphere::class, 'company_sphere')->withTrashed();
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
