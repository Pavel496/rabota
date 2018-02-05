<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;
use App\Resume;

use Spatie\ModelCleanup\GetsCleanedUp;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

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
*/
class Resume extends Model implements GetsCleanedUp
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['title', 'text', 'wage', 'company_address', 'avatar', 'phone_temp', 'experience_id', 'lasting_id', 'phone_id', 'created_by_id'];
    
    
     public static function cleanUp(Builder $query) : Builder
     {

        return $query->where(function ($q) {
            $q->where('lasting_id', '1')
                ->where('created_at', '<', Carbon::now()->subDays(1));
        })->orWhere(function($q) {
            $q->where('lasting_id', '2')
                ->where('created_at', '<', Carbon::now()->subDays(2));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '3')
                ->where('created_at', '<', Carbon::now()->subDays(3));	
        })->orWhere(function($q) { 
            $q->where('lasting_id', '4')
                ->where('created_at', '<', Carbon::now()->subDays(4));
        })->orWhere(function($q) {
            $q->where('lasting_id', '5')
                ->where('created_at', '<', Carbon::now()->subDays(5));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '6')
                ->where('created_at', '<', Carbon::now()->subDays(6));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '7')
                ->where('created_at', '<', Carbon::now()->subDays(7));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '8')
                ->where('created_at', '<', Carbon::now()->subDays(8));	
        })->orWhere(function($q) { 
            $q->where('lasting_id', '9')
                ->where('created_at', '<', Carbon::now()->subDays(9));
        })->orWhere(function($q) {
            $q->where('lasting_id', '10')
                ->where('created_at', '<', Carbon::now()->subDays(10));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '11')
                ->where('created_at', '<', Carbon::now()->subDays(11));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '12')
                ->where('created_at', '<', Carbon::now()->subDays(12));	
        })->orWhere(function($q) {
            $q->where('lasting_id', '13')
                ->where('created_at', '<', Carbon::now()->subDays(13));	
        })->orWhere(function($q) { 
             $q->where('lasting_id', '14')
                ->where('created_at', '<', Carbon::now()->subDays(14));

        });        

    }  

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
