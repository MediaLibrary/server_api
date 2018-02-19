<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

class PlatformRepositoryFactory extends AbstractRepositoryFactory
{
    public function create()
    {
        $query = $this->locator->getEntityInstantiator()->createPlatformQuery();

        return new PlatformRepository($query);
    }
}