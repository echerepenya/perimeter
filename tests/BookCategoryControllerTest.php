<?php

namespace App\Tests\Controller;

use App\Controller\BookCategoryController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BookCategoryControllerTest extends WebTestCase
{
    public function testCategories()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/book/categories');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/responses/BookcategoryControllerTest_testCategories.json',
            $responseContent
        );
    }
}