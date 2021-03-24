<?php
namespace AyhanKoyun\Joboffer\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Ayhan Koyun <ayhankoyun@hotmail.de>
 */
class JobApplyControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AyhanKoyun\Joboffer\Controller\JobApplyController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\AyhanKoyun\Joboffer\Controller\JobApplyController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

}
