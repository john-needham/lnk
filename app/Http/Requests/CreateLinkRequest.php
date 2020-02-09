<?php

namespace App\Http\Requests;

use App\Link;
use App\Policies\LinkPolicy;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateLink
 * @package App\Http\Requests
 */
class CreateLinkRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|url'
        ];
    }
}
