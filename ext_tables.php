<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Joboffer',
            'Joboffer',
            'Joboffer'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('joboffer', 'Configuration/TypoScript', 'JobOffer Extension');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_joboffer_domain_model_joboffer', 'EXT:joboffer/Resources/Private/Language/locallang_csh_tx_joboffer_domain_model_joboffer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_joboffer_domain_model_joboffer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_joboffer_domain_model_jobapply', 'EXT:joboffer/Resources/Private/Language/locallang_csh_tx_joboffer_domain_model_jobapply.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_joboffer_domain_model_jobapply');

    }
);
