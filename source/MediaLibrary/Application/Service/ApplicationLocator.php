<?php
/**
 * @author Net\Bazzline\Component\Locator
 * @since 2015-09-24
 */

namespace MediaLibrary\Application\Service;

use Net\Bazzline\Component\Locator\FactoryInterface;

/**
 * Class ApplicationLocator
 *
 * @package MediaLibrary\Application\Service
 */
class ApplicationLocator implements \Net\Bazzline\Component\Locator\LocatorInterface
{
    /**
     * @var $factoryInstancePool
     */
    private $factoryInstancePool = array();

    /**
     * @var $sharedInstancePool
     */
    private $sharedInstancePool = array();

    /**
     * @return \MediaLibrary\Application\Service\EntityInstantiator
     */
    public function getEntityInstantiator()
    {
        return $this->fetchFromSharedInstancePool('\MediaLibrary\Application\Service\EntityInstantiator');
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\ArtistRepository
     */
    public function getMediaArtistRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\ArtistRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\ArtistRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\DistributorRepository
     */
    public function getMediaDistributorRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\DistributorRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\DistributorRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\EditionRepository
     */
    public function getMediaEditionRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\EditionRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\EditionRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\GenreRepository
     */
    public function getMediaGenreRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\GenreRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\GenreRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\LanguageRepository
     */
    public function getMediaLanguageRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\LanguageRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\LanguageRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\PlatformRepository
     */
    public function getMediaPlatformRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\PlatformRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\PlatformRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @return \MediaLibrary\Infrastructure\Repository\Media\TypeRepository
     */
    public function getMediaTypeRepository()
    {
        $className = '\MediaLibrary\Infrastructure\Repository\Media\TypeRepository';

        if ($this->isNotInSharedInstancePool($className)) {
            $factoryClassName = '\MediaLibrary\Infrastructure\Repository\Media\TypeRepositoryFactory';
            $factory = $this->fetchFromFactoryInstancePool($factoryClassName);
            
            $this->addToSharedInstancePool($className, $factory->create());
        }

        return $this->fetchFromSharedInstancePool($className);
    }

    /**
     * @param string $className
     * @return FactoryInterface
     * @throws InvalidArgumentException
     */
    final protected function fetchFromFactoryInstancePool($className)
    {
        if ($this->isNotInFactoryInstancePool($className)) {
            if (!class_exists($className)) {
                throw new InvalidArgumentException(
                    'factory class "' . $className . '" does not exist'
                );
            }
            
            /** @var FactoryInterface $factory */
            $factory = new $className();
            $factory->setLocator($this);
            $this->addToFactoryInstancePool($className, $factory);
        }

        return $this->getFromFactoryInstancePool($className);
    }

    /**
     * @param string $className
     * @param FactoryInterface $factory
     * @return $this
     */
    private function addToFactoryInstancePool($className, FactoryInterface $factory)
    {
        $this->factoryInstancePool[$className] = $factory;

        return $this;
    }

    /**
     * @param string $className
     * @return null|FactoryInterface
     */
    private function getFromFactoryInstancePool($className)
    {
        return $this->factoryInstancePool[$className];
    }

    /**
     * @param string $className
     * @return boolean
     */
    private function isNotInFactoryInstancePool($className)
    {
        return (!isset($this->factoryInstancePool[$className]));
    }

    /**
     * @param string $className
     * @return object
     * @throws InvalidArgumentException
     */
    final protected function fetchFromSharedInstancePool($className)
    {
        if ($this->isNotInSharedInstancePool($className)) {
            if (!class_exists($className)) {
                throw new InvalidArgumentException(
                    'class "' . $className . '" does not exist'
                );
            }
            
            $instance = new $className();
            $this->addToSharedInstancePool($className, $instance);
        }

        return $this->getFromSharedInstancePool($className);
    }

    /**
     * @param string $className
     * @param object $instance
     * @return $this
     */
    private function addToSharedInstancePool($className, $instance)
    {
        $this->sharedInstancePool[$className] = $instance;

        return $this;
    }

    /**
     * @param string $className
     * @return null|object
     */
    private function getFromSharedInstancePool($className)
    {
        return $this->sharedInstancePool[$className];
    }

    /**
     * @param string $className
     * @return boolean
     */
    private function isNotInSharedInstancePool($className)
    {
        return (!isset($this->sharedInstancePool[$className]));
    }
}