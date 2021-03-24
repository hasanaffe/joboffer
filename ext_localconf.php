<?php
defined('TYPO3_MODE') || die('Access denied.');

use \AyhanKoyun\Joboffer\Controller\JobOfferController;
use \AyhanKoyun\Joboffer\Controller\JobApplyController;

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Joboffer',
            'Joboffer',
            [
                JobOfferController::class => 'list, show',
                JobApplyController::class => 'addForm, add'
            ],
            // non-cacheable actions
            [
                JobOfferController::class => 'list, show',
                JobApplyController::class => 'addForm, add'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        joboffer {
                            iconIdentifier = joboffer-plugin-joboffer
                            title = LLL:EXT:joboffer/Resources/Private/Language/locallang_db.xlf:tx_joboffer_joboffer.name
                            description = LLL:EXT:joboffer/Resources/Private/Language/locallang_db.xlf:tx_joboffer_joboffer.description
                            tt_content_defValues {
                                CType = list
                                list_type = joboffer_joboffer
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'joboffer-plugin-joboffer',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:joboffer/Resources/Public/Icons/user_plugin_joboffer.svg']
			);

        // Register TypeConverter
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(
            \AyhanKoyun\Joboffer\Property\TypeConverter\UploadedFileReferenceConverter::class
        );
    }
);
