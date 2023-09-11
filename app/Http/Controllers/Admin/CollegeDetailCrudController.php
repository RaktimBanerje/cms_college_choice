<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CollegeDetailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CollegeDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CollegeDetailCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CollegeDetail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/college-detail');
        CRUD::setEntityNameStrings('college detail', 'college details');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
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
        CRUD::setValidation(CollegeDetailRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

        CRUD::field([  // Select2
            'label'     => "College",
            'type'      => 'select2',
            'name'      => 'college_id', // the db column for the foreign key
            
            // optional
            'entity'    => 'college', // the method that defines the relationship in your Model
            'model'     => "App\Models\College", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            
                // also optional
            'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);

        
        
        CRUD::field([   // CKEditor
            'name'          => 'info',
            'label'         => 'Information',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);


        CRUD::field([   // Table
            'name'            => 'course',
            'label'           => 'Course',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'course'              => 'Course',
                'fees'       => 'Fees',
                'eligibility'     => 'Eigibility',
            ],
        ]);

        
        CRUD::field([   // Table
            'name'            => 'faq',
            'label'           => 'FAQs',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'question'  => 'Question',
                'answer'    => 'Answer',
            ],
        ]);


        CRUD::field([   // Table
            'name'            => 'faculty',
            'label'           => 'Faculty Member',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'name'              => 'Name',
                'designation'       => 'Designation',
                'qualification'     => 'Qualification',
                'email'             => 'email',
            ],
        ]);


        CRUD::field([   // CKEditor
            'name'          => 'admission',
            'label'         => 'Admission',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);



        CRUD::field([   // CKEditor
            'name'          => 'admission',
            'label'         => 'Admission',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);
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
