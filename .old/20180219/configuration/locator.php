<?php

return array(
    'assembler'     => '\Net\Bazzline\Component\Locator\Configuration\Assembler\FromArrayAssembler',
    'class_name'    => 'ApplicationLocator',
    'file_exists_strategy' => '\Net\Bazzline\Component\Locator\FileExistsStrategy\DeleteStrategy',
    'file_path'     => __DIR__ . '/../source/MediaLibrary/Application/Service',
    'implements'    => array(
        '\Net\Bazzline\Component\Locator\LocatorInterface'
    ),
    'instances' => array(
        array(
            'alias'         => 'EntityInstantiator',
            'class_name'    => '\MediaLibrary\Application\Service\EntityInstantiator',
            'is_factory'    => false,
            'is_shared'     => true
        ),
        array(
            'alias'         => 'MediaArtistRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\ArtistRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\ArtistRepository'
        ),
        array(
            'alias'         => 'MediaDistributorRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\DistributorRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\DistributorRepository'
        ),
        array(
            'alias'         => 'MediaEditionRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\EditionRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\EditionRepository'
        ),
        array(
            'alias'         => 'MediaGenreRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\GenreRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\GenreRepository'
        ),
        array(
            'alias'         => 'MediaLanguageRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\LanguageRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\LanguageRepository'
        ),
        array(
            'alias'         => 'MediaPlatformRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\PlatformRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\PlatformRepository'
        ),
        array(
            'alias'         => 'MediaTypeRepository',
            'class_name'    => '\MediaLibrary\Infrastructure\Repository\Media\TypeRepositoryFactory',
            'is_factory'    => true,
            'is_shared'     => true,
            'return_value'  => '\MediaLibrary\Infrastructure\Repository\Media\TypeRepository'
        )
    ),
    'method_prefix' => 'get',
    'namespace'     => 'MediaLibrary\Application\Service',
);
