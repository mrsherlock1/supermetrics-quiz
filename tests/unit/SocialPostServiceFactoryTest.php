<?php

namespace Tests\unit;
use PHPUnit\Framework\TestCase;
use SocialPost\Service\Factory\SocialPostServiceFactory;
use SocialPost\Service\SocialPostService;

class SocialPostServiceFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function test_social_service_factory_returns_correct_instance(){
        $socialPostServiceFactory = SocialPostServiceFactory::create();
        $this->assertInstanceOf(SocialPostService::class,$socialPostServiceFactory);
    }
}