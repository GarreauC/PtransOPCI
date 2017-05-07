<?php

namespace EthnoDoc\PublicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testProjects()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/projects');
    }

    public function testCalendar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/calendar');
    }

    public function testPartners()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/partners');
    }

    public function testNetwork()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/network');
    }

    public function testMissions()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/missions');
    }

    public function testVolunteer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/volunteer');
    }

    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');
    }

}
