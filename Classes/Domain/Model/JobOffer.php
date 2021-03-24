<?php
namespace AyhanKoyun\Joboffer\Domain\Model;


/***
 *
 * This file is part of the "JobOffer Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Ayhan Koyun <ayhankoyun@hotmail.de>
 *
 ***/
/**
 * JobOffer
 */
class JobOffer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * jobTitle
     * 
     * @var string
     */
    protected $jobTitle = '';

    /**
     * jobDescription
     * 
     * @var string
     */
    protected $jobDescription = '';

    /**
     * jobapplies
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AyhanKoyun\Joboffer\Domain\Model\JobApply>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $jobapplies = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initializeObject()
    {
        $this->jobapplies = $this->jobapplies ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the jobTitle
     * 
     * @return string $jobTitle
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Sets the jobTitle
     * 
     * @param string $jobTitle
     * @return void
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * Returns the jobDescription
     * 
     * @return string $jobDescription
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * Sets the jobDescription
     * 
     * @param string $jobDescription
     * @return void
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * Adds a JobApply
     * 
     * @param \AyhanKoyun\Joboffer\Domain\Model\JobApply $jobapply
     * @return void
     */
    public function addJobapply(\AyhanKoyun\Joboffer\Domain\Model\JobApply $jobapply)
    {
        $this->jobapplies->attach($jobapply);
    }

    /**
     * Removes a JobApply
     * 
     * @param \AyhanKoyun\Joboffer\Domain\Model\JobApply $jobapplyToRemove The JobApply to be removed
     * @return void
     */
    public function removeJobapply(\AyhanKoyun\Joboffer\Domain\Model\JobApply $jobapplyToRemove)
    {
        $this->jobapplies->detach($jobapplyToRemove);
    }

    /**
     * Returns the jobapplies
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AyhanKoyun\Joboffer\Domain\Model\JobApply> $jobapplies
     */
    public function getJobapplies()
    {
        return $this->jobapplies;
    }

    /**
     * Sets the jobapplies
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AyhanKoyun\Joboffer\Domain\Model\JobApply> $jobapplies
     * @return void
     */
    public function setJobapplies(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $jobapplies)
    {
        $this->jobapplies = $jobapplies;
    }
}
