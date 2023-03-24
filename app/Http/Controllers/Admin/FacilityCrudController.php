<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\FacilityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class FacilityCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Facility");
        $this->crud->setRoute("admin/facility");
        $this->crud->setEntityNameStrings('facility', 'facilities');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => __('Name'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(FacilityRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Name",
        ]);

        $this->crud->addField([ // Upload
            'name' => 'image',
            'hint' => __('Only Image type is allowed. Image should be of maximum 2MB. Only JPEG,JPG and PNG image types are allowed'),
            'label' => __('Icon'),
            'type' => 'upload',
            'upload' => true,
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
