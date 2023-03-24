<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\PetTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PetTypeCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\PetType");
        $this->crud->setRoute("admin/pet-type");
        $this->crud->setEntityNameStrings('pet type', 'pet types');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'title',
            'label' => __('Title'),
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => __('Description'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(PetTypeRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title",
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Description",
        ]);

        $this->crud->addField([ // Upload
            'name' => 'icon',
            'hint' => __('Only Image type is allowed. Image should be of maximum 2MB. Only JPEG,JPG and PNG image types are allowed'),
            'label' => __('Icon'),
            'type' => 'upload',
            'upload' => true,
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
