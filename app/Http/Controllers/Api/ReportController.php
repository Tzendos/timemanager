<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;

/**
 * Class ReportController
 * @package App\Http\Controllers\Api
 */
class ReportController extends Controller
{
    public function store(ReportRequest $request)
    {
        $attributes = $request->validated();
        $employee = Employee::whereChatId($attributes['chat_id'])->first();
        $employee->reports()->create($attributes);
    }
}
