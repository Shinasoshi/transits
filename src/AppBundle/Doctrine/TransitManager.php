<?php

namespace AppBundle\Doctrine;

use AppBundle\Entity\Transit;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Cache\Simple\FilesystemCache;

class TransitManager
{

    /**
     * @var EntityManager
     */
    private $em;

    private $cache;

    /**
     * TransitManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->cache = new FilesystemCache;
    }

    private function getAllTransits()
    {
        return $this->getRepository()->findBy(
            [],
            ["createdAt" => "desc"]
        );
    }

    private function cacheTransits()
    {
        $this->cache->set('all_transits', $this->getAllTransits(), 360000);

        return $this->getAllTransits();
    }

    private function generateUuid4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function getCachedTransits()
    {
        return $this->cache->get('all_transits', $this->cacheTransits());
    }

    public function addTransit($distance, $locations)
    {
        $transit = new Transit;
        $transit->setId($this->generateUuid4());
        $transit->setDistanceKilometers($distance);
        $transit->setLocations($locations);
        $transit->setCreatedAt(time());

        $this->em->persist($transit);
        $this->em->flush();

        $this->cacheTransits();

        return $transit;
    }

    public function validateLocations($locations)
    {
        return is_array($locations) && count($locations) >= 2 ? true : false;
    }

    public function getRepository()
    {
        return $this->em->getRepository(Transit::class);
    }
}