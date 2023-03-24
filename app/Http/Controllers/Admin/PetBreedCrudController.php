<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\PetBreedRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PetBreedCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\PetBreed");
        $this->crud->setRoute("admin/pet-breed");
        $this->crud->setEntityNameStrings('pet breed', 'pet breeds');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'title',
            'label' => __('Title'),
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => __('Status'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(PetBreedRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title",
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
