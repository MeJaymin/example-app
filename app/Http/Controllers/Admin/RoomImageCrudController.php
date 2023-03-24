<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomImageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoomImageCrudController extends CrudController
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\RoomImage");
        $this->crud->setRoute("admin/room-image");
        $this->crud->setEntityNameStrings('room image', 'room images');
    }

    public function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Images',
            'type' => 'upload_multiple',
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(RoomImageRequest::class);

        $this->crud->addField([ // Upload
            'name' => 'title',
            'label' => 'Images',
            'type' => 'upload_multiple',
            'upload' => true,
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
