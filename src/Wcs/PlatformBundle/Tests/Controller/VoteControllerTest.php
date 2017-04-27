<?php

namespace Wcs\PlatformBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VoteControllerTest extends WebTestCase
{
    public function testVote()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vote');
    }

}
