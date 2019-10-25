<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ApplicationTest\Controller;

use Application\Controller\ContactController;
use Application\Entity\Contact;
use Application\Service\ContactService;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ContactControllerTest extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
                        include __DIR__ . '/../../../../config/application.config.php',
                        $configOverrides
        ));

        parent::setUp();
    }

    public function testListActionCanBeAccessed()
    {
        $this->dispatch('/contacts', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(ContactController::class); // as specified in router's controller name alias
        $this->assertControllerClass('ContactController');
        $this->assertMatchedRouteName('contacts');
    }

    public function testListActionContains11Contacts()
    {
        $this->dispatch('/contacts', 'GET');
        $this->assertQueryCount('.container .table tr', 11);
    }

    public function testListActionContains2ContactsWithMock()
    {
        $mock = $this->getMockBuilder(ContactService::class)
                ->disableOriginalConstructor()
                ->getMock();

        $liste = [
            (new Contact())->setId(1)->setPrenom('Romain')->setNom('Bohdanowicz'),
            (new Contact())->setId(2)->setPrenom('Toto')->setNom('Titi'),
        ];

        $mock->expects($this->once())
                ->method('getAll')
                ->willReturn($liste);

        /* @var $sm ServiceManager */
        $sm = $this->getApplicationServiceLocator();
        $sm->setAllowOverride(true);
        $sm->setService(ContactService::class, $mock);


        $this->dispatch('/contacts', 'GET');
        $this->assertQueryCount('.container .table tr', 2);
    }

//
//    public function testInvalidRouteDoesNotCrash()
//    {
//        $this->dispatch('/invalid/route', 'GET');
//        $this->assertResponseStatusCode(404);
//    }
}
