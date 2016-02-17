<?php
namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Game;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class InsertingFile
//Takes care of inserting files into database when Game is created
{
    /* @var EntityManager */
    protected $em;

    /* @var ContainerInterface */
    protected $container;

    /* @var  $uploadManager UploadableManager */
    protected $uploadManager;

    public function __construct(ContainerInterface $container)
    {
        // We use container directly in order to avoid a CircularReferenceException
        $this->container = $container;
    }

    //Creates Path of File in Item
    public function onNewImage(Game $game)
    {
        $uploadManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');
        $createFilepathFolder = $this->container->get('create_folder_filespath');

        //if ($game->getImage()->getFile() != null) {
        //    $getUploadToken = $createFilepathFolder->getUploadToken();
        //    $image = $getUploadToken . '.jpg'; // renaming image
        //    $getUploadPath = $createFilepathFolder->getUploadPath();
		//	$file = $game->getImage()->getFile();

//            $game->getImage()->setUploadPath($getUploadPath);
//            $game->getImage()->setFilePath($getUploadPath . $image);
//            $game->getImage()->setFileName($getUploadToken);

//            $uploadManager->markEntityToUpload($game->getImage(), $game->getImage()->getFile());
        //}
    }
}