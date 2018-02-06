<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * Class Vacancy
 *
 * @package App
 * @property string $title
 * @property text $text
 * @property string $wage
 * @property string $company_address
 * @property string $experience
 * @property string $lasting
 * @property string $logotype
 * @property string $phone
 * @property string $phone_temp
 * @property string $created_by
*/
class Vacancy extends Model
{
    use SoftDeletes, FilterByUser;
    //, FilterByUser
    use SearchableTrait;


     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'vacancies.title' => 10,
            'vacancies.text' => 10,
            //'users.email' => 5,
            //'users.id' => 3,
        ]
    ];


    protected $fillable = ['title', 'text', 'wage', 'company_address', 'logotype', 'phone_temp', 'experience_id', 'lasting_id', 'phone_id', 'created_by_id'];



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
        return $this->belongsToMany(Sphere::class, 'sphere_vacancy')->withTrashed();
    }

    public function schedule_id()
    {
        return $this->belongsToMany(Schedule::class, 'schedule_vacancy')->withTrashed();
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
