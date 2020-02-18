<?php
declare(strict_types=1);

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;

/**
 * App\Models\Admin\Report
 *
 * @property int $id
 * @property int $employee_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Report whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Report extends \App\Models\Report
{
    use CrudTrait;
}
