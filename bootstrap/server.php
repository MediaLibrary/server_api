<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-22
 */

require __DIR__ . '/../vendor/autoload.php';

use MediaLibrary\Application\Service\ApplicationLocator;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//begin of dependencies
$application    = new Application();
$locator        = new ApplicationLocator();
//end of dependencies

$token = '';

//begin of overriding default functionality
$application->before(function (Request $request) use ($application, $token) {
    //begin of only allow requests with valid authorization token
    $isNotAuthorized = ($request->headers->get('authorization') !== $token);
    if ($isNotAuthorized) {
        $application->abort(403);
    }
    //end of only allow requests with valid authorization token
    //begin of decoding json request data
    $isJsonRequest = (0 === strpos($request->headers->get('Content-Type'), 'application/json'));
    if ($isJsonRequest) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
    //end of decoding json request data
});

$application->error(function (Exception $exception, $code) use ($application) {
    switch ($code) {
        case 404:
            $message = 'not found';
            break;
        case 403:
            $message = 'unauthorized';
            break;
        case 400:
            $message = $exception->getMessage();
            break;
        default:
            $message = 'the server made a boh boh:' . PHP_EOL .
                $exception->getMessage() . PHP_EOL;
            break;
    }
    return new Response($message, $code);
});
//end of overriding default functionality

//begin of routing
//@todo split of routes definition into separate files
//@todo preprocess request uri and load only needed routes
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_artist.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_distributor.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_edition.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_genre.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_language.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_platform.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routing_media_type.php';
//end of routing
