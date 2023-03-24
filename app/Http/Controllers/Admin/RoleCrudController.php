<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoleCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Role");
        $this->crud->setRoute("admin/role");
        $this->crud->setEntityNameStrings('role', 'roles');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => __('Name'),
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => __('Status'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(RoleRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Role Name",
        ]);
        $this->crud->addField([
            'name' => 'status',
            'type' => 'select_from_array',
            'label' => "Status",
            'options' => [
                // the key will be stored in the db, the value will be shown as label;
                "0" => "In-Active",
                "1" => "Active",
            ],
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
