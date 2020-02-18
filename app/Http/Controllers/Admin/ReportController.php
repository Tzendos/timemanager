<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Employee;
use App\Models\Admin\Report;
use App\Http\Requests\ReportCrudRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class ReportController
 * @package App\Http\Controllers\Admin
 *
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * @throws \Exception
     */
    public function setup(): void
    {
        $this->crud->setModel(Report::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/report');
        $this->crud->setEntityNameStrings('report', 'reports');
    }

    protected function setupListOperation(): void
    {
        $this->addColumns();
        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation(ReportCrudRequest::class);

        $this->addFields();
    }

    protected function setupUpdateOperation(): void
    {
        $this->crud->setValidation(ReportCrudRequest::class);

        $this->addFields();
    }

    protected function addColumns(): void
    {
        $this->crud->addColumns([
            'id',
            [
                'name' => 'employee_id',
                'label' => 'Employee',
                'type' => 'closure',
                'function' => static function (Report $report) {
                    return $report->employee->first_name . ' ' . $report->employee->last_name;
                }
            ],
            'created_at',
            'updated_at',
        ]);
    }

    protected function addFields(): void
    {
        $this->crud->addFields([
            [
                'label' => 'User',
                'type' => 'select2',
                'name' => 'employee_id',
                'entity' => 'employee',
                'attribute' => 'full_name',
                'model' => Employee::class,
            ],
            'content',
        ]);
    }
}
