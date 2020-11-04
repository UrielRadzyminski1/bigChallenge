<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MealRequest;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MealCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MealCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Meal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/meal');
        CRUD::setEntityNameStrings('meal', 'meals');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'category', // The db column name
            'label' => "Category Name", // Table column heading
            'type' => 'relationship',
            'attribute' => 'name',
          ]);
        CRUD::setFromDb(); // columns
        
        $categories = Category::select('id','name')->get()->toArray();
        $values = [];
        foreach ($categories as $category) {
            $values[$category["id"]] = $category["name"];
        }

        $this->crud->addFilter([
            'name'  => 'category',
            'type'  => 'dropdown',
            'label' => 'Category'
          ], 
            $values,
          function($value) { // if the filter is active
            $this->crud->addClause('where', 'category_id', $value);
          });

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MealRequest::class);

        /* CRUD::setFromDb(); // fields */
        CRUD::addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Name'
            ],
            [
                'name' => 'description',
                'type' => 'text',
                'label' => 'Descriptionn'
            ],
            [
                'name' => 'category_id',
                'type' => 'select2',
                'label' => 'Category'
            ],
            [
                'name' => 'price',
                'type' => 'number',
                'label' => 'Price',
                'attributes' => ["step" => "any"], // allow decimals
                'prefix'     => "$"
            ]

        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
