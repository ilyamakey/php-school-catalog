<?php

namespace App\RestApi\Controllers;
use App\Database\Query;
use App\RestApi\Views\JsonView;
use App\Views\RedirectView;
use App\Views\TemplateView;

class FormControllerRest
{
    public function index($params = [])
    {
        $query = new Query;
        $forms = $query->getList("SELECT * FROM forms");

        http_response_code(201);
        return new JsonView($forms);
    }

    public function view($params = [])
    {
        $query = new Query();
        $form = $query->getRow(
            "SELECT * FROM forms WHERE id = ?",
            [$params['id']]
        );

        http_response_code(201);
        return new JsonView($form);
    }

    public function create($params, $post)
    {
        $query = new Query();

        $query->execute(
            "INSERT INTO forms (title, content) VALUES (:title, :content)",
            $post['form']
        );

        $id = $query->getLastInsertId();

        http_response_code(201);
        return new JsonView(['response' => 'form created']);
    }

    public function delete($params)
    {
        (new Query)->execute("DELETE FROM forms WHERE id = ?", [$params['id']]);

        http_response_code(201);
        return new JsonView(['response' => 'form deleted']);
    }

    public function update($params)
    {

        $data = array_merge($params, $post['form']);
        (new Query)->execute("UPDATE forms SET title = :title, content = :content WHERE id = :id", $data);

        http_response_code(201);
        return new JsonView(['response' => 'form updated']);
    }
}
