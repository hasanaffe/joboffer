<?php
namespace AyhanKoyun\Joboffer\Controller;

use \AyhanKoyun\Joboffer\Property\TypeConverter\UploadedFileReferenceConverter;
use \TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;

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
 * JobOfferController
 */
class JobOfferController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * jobOfferRepository
     * 
     * @var \AyhanKoyun\Joboffer\Domain\Repository\JobOfferRepository
     */
    protected $jobOfferRepository = null;

    /**
     * @param \AyhanKoyun\Joboffer\Domain\Repository\JobOfferRepository $jobOfferRepository
     */
    public function injectJobOfferRepository(\AyhanKoyun\Joboffer\Domain\Repository\JobOfferRepository $jobOfferRepository)
    {
        $this->jobOfferRepository = $jobOfferRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $jobOffers = $this->jobOfferRepository->findAll();
        $this->view->assign('jobOffers', $jobOffers);
    }

    /**
     * action show
     * 
     * @param \AyhanKoyun\Joboffer\Domain\Model\JobOffer $jobOffer
     * @return void
     */
    public function showAction(\AyhanKoyun\Joboffer\Domain\Model\JobOffer $jobOffer)
    {
        $this->view->assign('jobOffer', $jobOffer);
    }

    /**
     * Set TypeConverter option for image upload
     */
    public function initializeAddAction(): void
    {
        $this->setTypeConverterConfigurationForImageUpload('jobOffer');
    }

    /**
     * Set TypeConverter configuration for image upload
     *
     * @param string
     */
    protected function setTypeConverterConfigurationForImageUpload($argumentName): void
    {
        $uploadConfiguration = [
            UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS =>
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER =>
                '1:/user_upload/',
        ];
        /** @var PropertyMappingConfiguration $propertyMappingConfiguration */
        $propertyMappingConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->forProperty('image')
            ->setTypeConverterOptions(
                UploadedFileReferenceConverter::class,
                $uploadConfiguration
            );
    }
}
