<?php

namespace MediaLibrary\Application\Service;

use MediaLibrary\Domain\Model\Media\Artist;
use MediaLibrary\Domain\Model\Media\ArtistQuery;
use MediaLibrary\Domain\Model\Media\Audio;
use MediaLibrary\Domain\Model\Media\AudioQuery;
use MediaLibrary\Domain\Model\Media\Audio\Track;
use MediaLibrary\Domain\Model\Media\Audio\TrackQuery;
use MediaLibrary\Domain\Model\Media\Book;
use MediaLibrary\Domain\Model\Media\BookQuery;
use MediaLibrary\Domain\Model\Media\Comment;
use MediaLibrary\Domain\Model\Media\CommentQuery;
use MediaLibrary\Domain\Model\Media\Distributor;
use MediaLibrary\Domain\Model\Media\DistributorQuery;
use MediaLibrary\Domain\Model\Media\Edition;
use MediaLibrary\Domain\Model\Media\EditionQuery;
use MediaLibrary\Domain\Model\Media\Game;
use MediaLibrary\Domain\Model\Media\GameQuery;
use MediaLibrary\Domain\Model\Media\Genre;
use MediaLibrary\Domain\Model\Media\GenreQuery;
use MediaLibrary\Domain\Model\Media\Language;
use MediaLibrary\Domain\Model\Media\LanguageQuery;
use MediaLibrary\Domain\Model\Media\Media;
use MediaLibrary\Domain\Model\Media\MediaQuery;
use MediaLibrary\Domain\Model\Media\MediaToArtist;
use MediaLibrary\Domain\Model\Media\MediaToArtistQuery;
use MediaLibrary\Domain\Model\Media\MediaToGenre;
use MediaLibrary\Domain\Model\Media\MediaToGenreQuery;
use MediaLibrary\Domain\Model\Media\MediaToLanguage;
use MediaLibrary\Domain\Model\Media\MediaToLanguageQuery;
use MediaLibrary\Domain\Model\Media\Platform;
use MediaLibrary\Domain\Model\Media\PlatformQuery;
use MediaLibrary\Domain\Model\Media\Type;
use MediaLibrary\Domain\Model\Media\TypeQuery;
use MediaLibrary\Domain\Model\Media\Video;
use MediaLibrary\Domain\Model\Media\VideoQuery;
use MediaLibrary\Domain\Model\User\Identity;
use MediaLibrary\Domain\Model\User\IdentityQuery;
use MediaLibrary\Domain\Model\User\User;
use MediaLibrary\Domain\Model\User\UserQuery;
use PDO;
use Propel;

/**
 * Class EntityInstantiator
 *
 * @author Net\Bazzline\Propel\Behavior\EntityInstantiatorNet\Bazzline\Propel\Behavior\EntityInstantiator\FileContentGenerator
 * @since 2015-09-24
 * @see http://www.bazzline.net
 */
class EntityInstantiator
{
    /**
     * @param null|string $name - The data source name that is used to look up the DSN from the runtime configuration file.
     * @param string $mode The connection mode (this applies to replication systems).
     * @return PDO
     */
    public function getConnection($name = null, $mode = Propel::CONNECTION_WRITE)
    {
        return Propel::getConnection($name, $mode);
    }

    /**
     * @return Identity
     */
    public function createIdentity()
    {
        return new Identity();
    }

    /**
     * @return IdentityQuery
     */
    public function createIdentityQuery()
    {
        return IdentityQuery::create();
    }

    /**
     * @return User
     */
    public function createUser()
    {
        return new User();
    }

    /**
     * @return UserQuery
     */
    public function createUserQuery()
    {
        return UserQuery::create();
    }

    /**
     * @return Media
     */
    public function createMedia()
    {
        return new Media();
    }

    /**
     * @return MediaQuery
     */
    public function createMediaQuery()
    {
        return MediaQuery::create();
    }

    /**
     * @return Artist
     */
    public function createArtist()
    {
        return new Artist();
    }

    /**
     * @return ArtistQuery
     */
    public function createArtistQuery()
    {
        return ArtistQuery::create();
    }

    /**
     * @return Audio
     */
    public function createAudio()
    {
        return new Audio();
    }

    /**
     * @return AudioQuery
     */
    public function createAudioQuery()
    {
        return AudioQuery::create();
    }

    /**
     * @return Track
     */
    public function createTrack()
    {
        return new Track();
    }

    /**
     * @return TrackQuery
     */
    public function createTrackQuery()
    {
        return TrackQuery::create();
    }

    /**
     * @return Book
     */
    public function createBook()
    {
        return new Book();
    }

    /**
     * @return BookQuery
     */
    public function createBookQuery()
    {
        return BookQuery::create();
    }

    /**
     * @return Video
     */
    public function createVideo()
    {
        return new Video();
    }

    /**
     * @return VideoQuery
     */
    public function createVideoQuery()
    {
        return VideoQuery::create();
    }

    /**
     * @return Game
     */
    public function createGame()
    {
        return new Game();
    }

    /**
     * @return GameQuery
     */
    public function createGameQuery()
    {
        return GameQuery::create();
    }

    /**
     * @return Comment
     */
    public function createComment()
    {
        return new Comment();
    }

    /**
     * @return CommentQuery
     */
    public function createCommentQuery()
    {
        return CommentQuery::create();
    }

    /**
     * @return Distributor
     */
    public function createDistributor()
    {
        return new Distributor();
    }

    /**
     * @return DistributorQuery
     */
    public function createDistributorQuery()
    {
        return DistributorQuery::create();
    }

    /**
     * @return Edition
     */
    public function createEdition()
    {
        return new Edition();
    }

    /**
     * @return EditionQuery
     */
    public function createEditionQuery()
    {
        return EditionQuery::create();
    }

    /**
     * @return Platform
     */
    public function createPlatform()
    {
        return new Platform();
    }

    /**
     * @return PlatformQuery
     */
    public function createPlatformQuery()
    {
        return PlatformQuery::create();
    }

    /**
     * @return Genre
     */
    public function createGenre()
    {
        return new Genre();
    }

    /**
     * @return GenreQuery
     */
    public function createGenreQuery()
    {
        return GenreQuery::create();
    }

    /**
     * @return Language
     */
    public function createLanguage()
    {
        return new Language();
    }

    /**
     * @return LanguageQuery
     */
    public function createLanguageQuery()
    {
        return LanguageQuery::create();
    }

    /**
     * @return Type
     */
    public function createType()
    {
        return new Type();
    }

    /**
     * @return TypeQuery
     */
    public function createTypeQuery()
    {
        return TypeQuery::create();
    }

    /**
     * @return MediaToArtist
     */
    public function createMediaToArtist()
    {
        return new MediaToArtist();
    }

    /**
     * @return MediaToArtistQuery
     */
    public function createMediaToArtistQuery()
    {
        return MediaToArtistQuery::create();
    }

    /**
     * @return MediaToGenre
     */
    public function createMediaToGenre()
    {
        return new MediaToGenre();
    }

    /**
     * @return MediaToGenreQuery
     */
    public function createMediaToGenreQuery()
    {
        return MediaToGenreQuery::create();
    }

    /**
     * @return MediaToLanguage
     */
    public function createMediaToLanguage()
    {
        return new MediaToLanguage();
    }

    /**
     * @return MediaToLanguageQuery
     */
    public function createMediaToLanguageQuery()
    {
        return MediaToLanguageQuery::create();
    }
}