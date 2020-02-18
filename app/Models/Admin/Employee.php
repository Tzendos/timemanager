<?php
declare(strict_types=1);

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;

/**
 * App\Models\Admin\Employee
 *
 * @property int $id
 * @property int $chat_id
 * @property string $first_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $reports
 * @property-read int|null $reports_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employee extends \App\Models\Employee
{
    use CrudTrait;
}
