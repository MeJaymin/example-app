<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRoleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class UserRoleCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\UserRole");
        $this->crud->setRoute("admin/user-role");
        $this->crud->setEntityNameStrings('user role', 'user roles');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'user_id',
            'label' => __('User'),
        ]);
        $this->crud->addColumn([
            'name' => 'role_id',
            'label' => __('Role'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(UserRoleRequest::class);

        $this->crud->addField([
            'label' => __('User'),
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => 'App\Models\User',
        ]);

        $this->crud->addField([
            'label' => __('Role'),
            'type' => 'select',
            'name' => 'role_id',
            'entity' => 'role',
            'attribute' => 'name',
            'model' => 'App\Models\Role',
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
