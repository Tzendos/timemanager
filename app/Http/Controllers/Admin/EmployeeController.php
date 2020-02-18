<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Models\Admin\Employee;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Admin
 *
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployeeController extends CrudController
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
        $this->crud->setModel(Employee::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/employee');
        $this->crud->setEntityNameStrings('employee', 'employees');
    }

    protected function setupListOperation(): void
    {
        $this->addColumns();
        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation(EmployeeRequest::class);

        $this->addFields();
    }

    protected function setupUpdateOperation(): void
    {
        $this->crud->setValidation(EmployeeRequest::class);

        $this->addFields();
    }

    protected function addColumns(): void
    {
        $this->crud->addColumns([
            'id',
            'chat_id',
            'first_name',
            'last_name',
            'created_at',
            'updated_at',
        ]);
    }

    protected function addFields(): void
    {
        $this->crud->addFields([
            'chat_id',
            'first_name',
            'last_name',
        ]);
    }
}
