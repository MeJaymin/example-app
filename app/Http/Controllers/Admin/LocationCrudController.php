<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LocationCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Location");
        $this->crud->setRoute("admin/location");
        $this->crud->setEntityNameStrings('location', 'locations');
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
        $this->crud->setValidation(LocationRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title",
        ]);

        $this->crud->addField([
            'name' => 'latitude',
            'type' => 'text',
            'label' => "Latitude",
        ]);

        $this->crud->addField([
            'name' => 'longitude',
            'type' => 'text',
            'label' => "Longitude",
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
