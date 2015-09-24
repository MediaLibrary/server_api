<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-23
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

use MediaLibrary\Domain\Model\Media\Artist;
use MediaLibrary\Domain\Model\Media\ArtistQuery;
use Exception;
use PropelException;
use PropelObjectCollection;

/**
 * Class ArtistRepository
 * @package MediaLibrary\Infrastructure\Repository\Media
 *
 * @todo create abstract repository or repository interface
 * @todo implement usage of bazzline toolbox experiment to execute save|delete|find up to three times
 * @todo add cache for CQRS
 * @todo add formatter to not use propel objects
 */
class ArtistRepository
{
    /** @var ArtistQuery */
    private $query;

    /**
     * @param ArtistQuery $query
     */
    public function __construct(ArtistQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return Artist
     */
    public function create()
    {
        return $this->query->createEntity();
    }

    /**
     * @param int $id
     */
    public function filterById($id)
    {
        $this->query->filterById($id);
    }

    /**
     * @param string $name
     */
    public function filterByName($name)
    {
        $this->query->filterByName($name);
    }

    /**
     * @return bool
     */
    public function hasOne()
    {
        return ($this->query->count() == 1);
    }

    /**
     * @return bool
     */
    public function hasMany()
    {
        return ($this->query->count() >= 1);
    }

    /**
     * @return null|Artist
     */
    public function findOne()
    {
        return $this->query->findOne();
    }

    /**
     * @return array|mixed|PropelObjectCollection|Artist[]
     */
    public function findMany()
    {
        return $this->query->find();
    }

    /**
     * @return integer the number of deleted rows
     * @throws Exception
     * @throws PropelException
     */
    public function delete()
    {
        return $this->query->delete();
    }

    /**
     * @param Artist|Artist[] $entityOrCollection
     * @throws Exception
     * @throws PropelException
     */
    public function save($entityOrCollection)
    {
        if ($entityOrCollection instanceof Artist) {
            $entityOrCollection->save();
        } else {
            foreach ($entityOrCollection as $entity) {
                $entity->save();
            }
        }
    }
}