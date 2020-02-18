<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

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
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation(ReportCrudRequest::class);
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
