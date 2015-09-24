<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$application->delete('/media/type/{id}', function (Application $application, $id) use ($locator) {
    $repository = $locator->getMediaTypeRepository();
    $repository->filterById($id);

    if ($repository->hasOne()) {
        $wasSuccessful = false;
    } else {
        try {
            $repository->delete();
            $wasSuccessful = true;
        } catch (Exception $exception) {
            $wasSuccessful = false;
        }
    }

    return $application->json(($wasSuccessful ? 'ok' : 'not ok'));
});

$application->get('/media/type', function (Application $application, Request $request) use ($locator) {
    $filterById         = $request->get('filterById');
    $filterByName       = $request->get('filterByName');

    $hasFilterById      = ((!is_null($filterById)) && (is_numeric($filterById)));
    $hasFilterByName    = ((!is_null($filterByName)) && (is_numeric($filterByName)));

    $repository         = $locator->getMediaTypeRepository();

    if ($hasFilterById) {
        $repository->filterById($filterById);
    }

    if ($hasFilterByName) {
        $repository->filterByName($filterByName);
    }

    $collection = $repository->findMany();

    return $application->json($collection);
});

$application->post('/media/type', function (Application $application, Request $request) use ($locator) {
    $name       = $request->get('name');
    $repository = $locator->getMediaTypeRepository();

    $repository->filterByName($name);

    if ($repository->hasOne()) {
        $wasSuccessful = false;
    } else {
        try {
            $entity = $repository->create();
            $entity->setName($name);
            $repository->save($entity);
            $wasSuccessful = true;
        } catch (Exception $exception) {
            $wasSuccessful = false;
        }
    }

    return $application->json(($wasSuccessful ? 'ok' : 'not ok'));
});

$application->put('/media/type/{id}', function (Application $application, Request $request, $id) use ($locator) {
    $name       = $request->get('name');
    $repository = $locator->getMediaTypeRepository();

    $repository->filterById($id);
    $entity = $repository->findOne();

    try {
        $entity->setName($name);
        $repository->save($entity);
        $wasSuccessful = true;
    } catch (Exception $exception) {
        $wasSuccessful = false;
    }

    return $application->json(($wasSuccessful ? 'ok' : 'not ok'));
});