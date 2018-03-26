<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;

class {{name}} extends \App\Controller
{
    public function indexAction(): ResponseInterface
    {
        $collection = $this->entity('{{name_lower}}')->loadAll($this->filters ?? [], true)->all();

        return $this->response->withJson($collection);
    }

    public function viewAction(): ResponseInterface
    {
        $id = $this->request->getAttribute('id');
        if(!$id) {
            return $this->notFoundHandler($this->request, $this->response);
        }
        $entity = $this->entity('{{name_lower}}')->load($id);

        return $this->response->withJson($entity->getData());
    }

    public function editAction(): ResponseInterface
    {
        $data = $this->request->getParsedBody();
        $entity = $this->entity('{{name_lower}}')->load($data['id'] ?? null);
        if(!$entity->getId()) {
            return $this->notFoundHandler($this->request, $this->response);
        }

        $entity->setData($data);
        $errors = $entity->validate();
        if($errors) {
            return $this->response->withJson($errors, 400);
        }

        $entity->save(false);

        return $this->response->withJson(['id' => $entity->getId()]);
    }

    public function createAction(): ResponseInterface
    {
        $data = $this->request->getParsedBody();
        $entity = $this->entity('{{name_lower}}')->setData($data);
        $errors = $entity->validate();
        if($errors) {
            return $this->response->withJson($errors, 400);
        }
        $entity->save(false);

        return $this->response->withJson(['id' => $entity->getId()]);
    }

    public function deleteAction(): ResponseInterface
    {
        $id = $this->request->getAttribute('id');
        if(!$id) {
            return $this->notFoundHandler($this->request, $this->response);
        }
        $entity = $this->entity('{{name_lower}}')->load($id);
        $entity->delete();

        return $this->response->withJson(['id' => $entity->getId()]);
    }
}
