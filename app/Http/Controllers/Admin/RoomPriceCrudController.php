<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomPriceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoomPriceCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\RoomPrice");
        $this->crud->setRoute("admin/room-price");
        $this->crud->setEntityNameStrings('room price', 'room prices');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'room_id',
            'label' => 'Room',
            'type' => 'select',
            'entity' => 'room',
            'attribute' => 'title',
            'model' => 'App\Models\Room',
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(RoomPriceRequest::class);

        $this->crud->addField([ // Upload Multiple File
            'name' => 'price',
            'label' => 'Price',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'label' => __('Room'),
            'type' => 'select',
            'name' => 'room_id',
            'entity' => 'room',
            'attribute' => 'title',
            'model' => 'App\Models\Room',
        ]);

    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
