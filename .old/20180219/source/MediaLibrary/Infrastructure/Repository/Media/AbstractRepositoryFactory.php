<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-09-24
 */
namespace MediaLibrary\Infrastructure\Repository\Media;

use MediaLibrary\Application\Service\ApplicationLocator;
use Net\Bazzline\Component\Locator\FactoryInterface;
use Net\Bazzline\Component\Locator\LocatorInterface;

abstract class AbstractRepositoryFactory implements FactoryInterface
{
    /** @var ApplicationLocator */
    protected $locator;

    /**
     * @param LocatorInterface $locator
     * @return $this
     */
    public function setLocator(LocatorInterface $locator)
    {
        $this->locator = $locator;

        return $this;
    }
}