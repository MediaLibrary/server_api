<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-23
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

class ArtistRepositoryFactory extends AbstractRepositoryFactory
{
    public function create()
    {
        $query = $this->locator->getEntityInstantiator()->createArtistQuery();

        return new ArtistRepository($query);
    }
}