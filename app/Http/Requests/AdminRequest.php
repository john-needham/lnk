<?php

namespace App\Http\Requests;

use App\Link;
use App\Policies\LinkPolicy;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AdminRequest
 * @property Link link
 * @package App\Http\Requests
 */
class AdminRequest extends FormRequest
{
    /**
     * Determine if the request is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var LinkPolicy $policy */
        $policy = policy(Link::class);
        return $policy->view(null, $this->link);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             //
        ];
    }
}
