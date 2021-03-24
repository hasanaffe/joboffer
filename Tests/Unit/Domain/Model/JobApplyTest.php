<?php
namespace AyhanKoyun\Joboffer\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Ayhan Koyun <ayhankoyun@hotmail.de>
 */
class JobApplyTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AyhanKoyun\Joboffer\Domain\Model\JobApply
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AyhanKoyun\Joboffer\Domain\Model\JobApply();
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
    public function getSalutationReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getSalutation()
        );
    }

    /**
     * @test
     */
    public function setSalutationForIntSetsSalutation()
    {
        $this->subject->setSalutation(12);

        self::assertAttributeEquals(
            12,
            'salutation',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFirstNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstName()
        );
    }

    /**
     * @test
     */
    public function setFirstNameForStringSetsFirstName()
    {
        $this->subject->setFirstName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'firstName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLastNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLastName()
        );
    }

    /**
     * @test
     */
    public function setLastNameForStringSetsLastName()
    {
        $this->subject->setLastName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'lastName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZipCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZipCode()
        );
    }

    /**
     * @test
     */
    public function setZipCodeForStringSetsZipCode()
    {
        $this->subject->setZipCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zipCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCurriculumVitaeReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getCurriculumVitae()
        );
    }

    /**
     * @test
     */
    public function setCurriculumVitaeForFileReferenceSetsCurriculumVitae()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setCurriculumVitae($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'curriculumVitae',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }
}
