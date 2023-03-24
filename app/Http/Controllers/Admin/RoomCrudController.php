<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoomCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Room");
        $this->crud->setRoute("admin/room");
        $this->crud->setEntityNameStrings('room', 'rooms');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'title',
            'label' => __('Title'),
        ]);

        $this->crud->addColumn([
            'name' => 'hostel_id',
            'label' => __('Hostel'),
        ]);

        $this->crud->addColumn([
            'name' => 'max_pet',
            'label' => __('Max Pet'),
        ]);

        $this->crud->addColumn([
            'name' => 'min_pet',
            'label' => __('Min Pet'),
        ]);

        $this->crud->addColumn([
            'name' => 'no_of_rooms',
            'label' => __('No of Rooms'),
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(RoomRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title",
        ]);

        $this->crud->addField([
            'label' => __('Hostel'),
            'type' => 'select',
            'name' => 'hostel_id',
            'entity' => 'hostel',
            'attribute' => 'name',
            'model' => 'App\Models\Hostel',
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'text',
            'label' => "Description",
        ]);

        $this->crud->addField([
            'name' => 'max_pet',
            'type' => 'number',
            'label' => "Max Pet",
        ]);

        $this->crud->addField([
            'name' => 'min_pet',
            'type' => 'number',
            'label' => "Min Pet",
        ]);

        $this->crud->addField([
            'name' => 'room_number',
            'type' => 'text',
            'label' => "Room Number",
        ]);

        $this->crud->addField([
            'name' => 'no_of_rooms',
            'type' => 'number',
            'label' => "No of Rooms (Quantity)",
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
