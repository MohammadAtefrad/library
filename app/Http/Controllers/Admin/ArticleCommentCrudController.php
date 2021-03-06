<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleCommentRequest as StoreRequest;
use App\Http\Requests\ArticleCommentRequest as UpdateRequest;

/**
 * Class ArticleCommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCommentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
         */
        $this->crud->setModel('App\ArticleComment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/articlecomment');
        $this->crud->setEntityNameStrings('نظر برای مقاله', 'نظرات مقالات');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
         */
        // How disable insert, delete & edit buttons:
        // $this->crud->denyAccess('delete');
        // $this->crud->denyAccess('create');

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'body',
            'type' => 'textarea',
            'label' => "متن نظر"
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'user_id',
            'label' => 'از طرف',
            'entity' => 'user',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'article_id',
            'label' => 'برای مقاله',
            'entity' => 'article',
            'attribute' => 'title',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'reference_comment_id',
            'label' => 'در پاسخ به',
            'entity' => 'parent',
            'attribute' => 'body',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'comment_status_id',
            'label' => 'وضعیت',
            'entity' => 'commentStatus',
            'attribute' => 'comment_status',
        ]);

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'number',
            'label' => 'شناسه',
        ]);
        $this->crud->addColumn([
            'name' => 'body',
            'type' => 'text',
            'label' => 'متن نظر',
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'از طرف',
            'name' => 'user_id',
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'برای مقاله',
            'name' => 'article_id',
            'entity' => 'article', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'text',
            'label' => 'در پاسخ به شناسه',
            'name' => 'reference_comment_id',
            // 'entity' => 'article', // the method that defines the relationship in your Model
            // 'attribute' => 'title', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'وضعیت',
            'name' => 'comment_status_id',
            'entity' => 'commentStatus', // the method that defines the relationship in your Model
            'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'datetime',
            'label' => 'زمان ایجاد',
            'name' => 'created_at',
            // 'entity' => 'commentStatus', // the method that defines the relationship in your Model
            // 'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'datetime',
            'label' => 'زمان آخرین تغییرات',
            'name' => 'updated_at',
            // 'entity' => 'commentStatus', // the method that defines the relationship in your Model
            // 'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);


        // add asterisk for fields that are required in ArticleCommentRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
