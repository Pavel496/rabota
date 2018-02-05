<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Resume
 *
 * @package App
 * @property string $title
 * @property text $text
 * @property string $wage
 * @property string $company_address
 * @property string $experience
 * @property string $lasting
 * @property string $avatar
 * @property string $phone
 * @property string $phone_temp
 * @property string $created_by
 * @property string $to_delete_at
*/
class Resume extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['title', 'text', 'wage', 'company_address', 'avatar', 'phone_temp', 'to_delete_at', 'experience_id', 'lasting_id', 'phone_id', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setExperienceIdAttribute($input)
    {
        $this->attributes['experience_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLastingIdAttribute($input)
    {
        $this->attributes['lasting_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPhoneIdAttribute($input)
    {
        $this->attributes['phone_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setToDeleteAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['to_delete_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['to_delete_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getToDeleteAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function sphere_id()
    {
        return $this->belongsToMany(Sphere::class, 'resume_sphere')->withTrashed();
    }
    
    public function schedule_id()
    {
        return $this->belongsToMany(Schedule::class, 'resume_schedule')->withTrashed();
    }
    
    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id')->withTrashed();
    }
    
    public function lasting()
    {
        return $this->belongsTo(Lasting::class, 'lasting_id')->withTrashed();
    }
    
    public function phone()
    {
        return $this->belongsTo(Phone::class, 'phone_id')->withTrashed();
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
