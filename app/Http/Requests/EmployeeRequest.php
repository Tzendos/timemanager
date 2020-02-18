<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class EmployeeRequest
 * @package App\Http\Requests
 */
class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min:2',
            ],
            'last_name' => [
                'required',
                'string',
                'min:2',
            ],
            'chat_id' => [
                'required',
                'integer',
                Rule::unique('employees', 'chat_id'),
            ],
        ];
    }
}
