<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Http\Controllers\Controller;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Api
 */
class EmployeeController extends Controller
{
    public function search($chatId): array
    {
        $employee = Employee::whereChatId($chatId)->firstOrFail();

        return [
            'id' => $employee->id,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
        ];
    }
}
