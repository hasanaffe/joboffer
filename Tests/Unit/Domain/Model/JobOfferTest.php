<?php
namespace AyhanKoyun\Joboffer\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Ayhan Koyun <ayhankoyun@hotmail.de>
 */
class JobOfferTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AyhanKoyun\Joboffer\Domain\Model\JobOffer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AyhanKoyun\Joboffer\Domain\Model\JobOffer();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getJobTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getJobTitle()
        );
    }

    /**
     * @test
     */
    public function setJobTitleForStringSetsJobTitle()
    {
        $this->subject->setJobTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'jobTitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getJobDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getJobDescription()
        );
    }

    /**
     * @test
     */
    public function setJobDescriptionForStringSetsJobDescription()
    {
        $this->subject->setJobDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'jobDescription',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getJobappliesReturnsInitialValueForJobApply()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getJobapplies()
        );
    }

    /**
     * @test
     */
    public function setJobappliesForObjectStorageContainingJobApplySetsJobapplies()
    {
        $jobapply = new \AyhanKoyun\Joboffer\Domain\Model\JobApply();
        $objectStorageHoldingExactlyOneJobapplies = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneJobapplies->attach($jobapply);
        $this->subject->setJobapplies($objectStorageHoldingExactlyOneJobapplies);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneJobapplies,
            'jobapplies',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addJobapplyToObjectStorageHoldingJobapplies()
    {
        $jobapply = new \AyhanKoyun\Joboffer\Domain\Model\JobApply();
        $jobappliesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $jobappliesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($jobapply));
        $this->inject($this->subject, 'jobapplies', $jobappliesObjectStorageMock);

        $this->subject->addJobapply($jobapply);
    }

    /**
     * @test
     */
    public function removeJobapplyFromObjectStorageHoldingJobapplies()
    {
        $jobapply = new \AyhanKoyun\Joboffer\Domain\Model\JobApply();
        $jobappliesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $jobappliesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($jobapply));
        $this->inject($this->subject, 'jobapplies', $jobappliesObjectStorageMock);

        $this->subject->removeJobapply($jobapply);
    }
}
