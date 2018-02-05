<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreResumesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'sphere_id.*' => 'exists:spheres,id',
            'schedule_id.*' => 'exists:schedules,id',
            'to_delete_at' => 'nullable|date_format:'.config('app.date_format'),
        ];
    }
}
