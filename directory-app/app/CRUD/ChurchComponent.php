<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Church;

class ChurchComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Church::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['nombre', 'mapa', 'direccion', 'ciudad', 'estado', 'pais', 'cp', 'ubicacion_enlace', 'status', 'telefono', 'email', 'pagina_web', 'facebook', 'instagram'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['nombre', 'pais', 'cp', 'status' ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'nombre' => 'text',
            'mapa'=> 'text',
            'direccion'=> 'text',
            'ciudad'=> 'text',
            'estado'=> 'text',
            'pais'=> 'text',
            'cp'=> 'text',
            'ubicacion_enlace'=> 'text',
            'status'=> 'text',
            'telefono'=> 'text',
            'email'=> 'text',
            'facebook'=> 'text',
            'pagina_web'=> 'text',
            'instagram'=> 'text',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'nombre'=> 'required|min:7|max:50',
            'mapa' => 'required|min:50',
            'direccion'=> 'required|min:10',
            'ciudad'=> 'required|min:5',
            'estado'=> 'required|min:6',
            'pais' => 'required|min:6',
            'cp'=> 'required|min:5',
            'status' => 'required|min:6'

        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}


    

