<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Simple Quiz'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Simple Quiz');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/quizflex.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_simplequiz_domain_model_question','EXT:simplequiz/Resources/Private/Language/locallang_csh_tx_simplequiz_domain_model_question.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_simplequiz_domain_model_question');
$TCA['tx_simplequiz_domain_model_question'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_question',
		'label' 			=> 'question',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_simplequiz_domain_model_question.png'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_simplequiz_domain_model_answer','EXT:simplequiz/Resources/Private/Language/locallang_csh_tx_simplequiz_domain_model_answer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_simplequiz_domain_model_answer');
$TCA['tx_simplequiz_domain_model_answer'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_answer',
		'label' 			=> 'answer',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_simplequiz_domain_model_answer.png'
	)
);


?>