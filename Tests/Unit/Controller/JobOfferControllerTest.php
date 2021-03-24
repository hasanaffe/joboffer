<?php
namespace AyhanKoyun\Joboffer\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Ayhan Koyun <ayhankoyun@hotmail.de>
 */
class JobOfferControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AyhanKoyun\Joboffer\Controller\JobOfferController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\AyhanKoyun\Joboffer\Controller\JobOfferController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllJobOffersFromRepositoryAndAssignsThemToView()
    {

        $allJobOffers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $jobOfferRepository = $this->getMockBuilder(\AyhanKoyun\Joboffer\Domain\Repository\JobOfferRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $jobOfferRepository->expects(self::once())->method('findAll')->will(self::returnValue($allJobOffers));
        $this->inject($this->subject, 'jobOfferRepository', $jobOfferRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('jobOffers', $allJobOffers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenJobOfferToView()
    {
        $jobOffer = new \AyhanKoyun\Joboffer\Domain\Model\JobOffer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('jobOffer', $jobOffer);

        $this->subject->showAction($jobOffer);
    }
}
