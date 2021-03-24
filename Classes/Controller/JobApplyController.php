<?php
namespace AyhanKoyun\Joboffer\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use AyhanKoyun\Joboffer\Domain\Model\JobOffer;
use AyhanKoyun\Joboffer\Domain\Model\JobApply;
use AyhanKoyun\Joboffer\Domain\Repository\JobApplyRepository;
use AyhanKoyun\Joboffer\Domain\Repository\JobOfferRepository;


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
 * JobApplyController
 */
class JobApplyController extends ActionController
{

    /**
     * jobApplyRepository
     * 
     * @var \AyhanKoyun\Joboffer\Domain\Repository\JobApplyRepository
     */
    protected $jobApplyRepository = null;

    /**
     * @param \AyhanKoyun\Joboffer\Domain\Repository\JobApplyRepository $jobApplyRepository
     */
    public function injectJobApplyRepository(\AyhanKoyun\Joboffer\Domain\Repository\JobApplyRepository $jobApplyRepository)
    {
        $this->jobApplyRepository = $jobApplyRepository;
    }

    /**
     * action addForm
     *
     * @param JobOffer $jobOffer
     * @param JobApply $jobApply
     */
    public function addFormAction(JobOffer $jobOffer, JobApply $jobApply = null): void
    {
        $this->view->assign('jobOffer', $jobOffer);
        $this->view->assign('jobApply', $jobApply);
    }

    /**
     * action add
     *
     * @param JobOffer $jobOffer
     * @param JobApply $jobApply
     */
    public function addAction(JobOffer $jobOffer, JobApply $jobApply = null): void
    {
        $this->jobApplyRepository->add($jobApply);
        $jobOffer->addJobApply($jobApply);
        $this->addFlashMessage(
            'Thanks! we\' ve received your job apply.',
            'Apply received',
            $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::OK,
            $storeInSession = true
        );
        $this->objectManager->get(JobOfferRepository::class)->update($jobOffer);
        $this->redirect('show', 'JobOffer', null, ['jobOffer' => $jobOffer]);
    }
}
