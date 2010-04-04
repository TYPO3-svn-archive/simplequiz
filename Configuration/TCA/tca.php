<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_simplequiz_domain_model_question'] = array(
	'ctrl' => $TCA['tx_simplequiz_domain_model_question']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'question,explanation,answers'
	),
	'types' => array(
		'1' => array('showitem' => 'question, explanation;;;richtext, answers')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_simplequiz_domain_model_question',
				'foreign_table_where' => 'AND tx_simplequiz_domain_model_question.uid=###REC_FIELD_l18n_parent### AND tx_simplequiz_domain_model_question.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'question' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_question.question',
			'config'  => array(
				'type' => 'text',
				'cols' => 80,
				'eval' => 'trim,required'
			)
		),
		'explanation' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_question.explanation',
	        'config' => array (
	            'type' => 'text',
	            'cols' => '30',
	            'rows' => '5',
	            'wizards' => array(
	                '_PADDING' => 2,
	                'RTE' => array(
	                    'notNewRecords' => 1,
	                    'RTEonly'       => 1,
	                    'type'          => 'script',
						'title'			=> 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
	                    'icon'          => 'wizard_rte2.gif',
						'script'        => 'wizard_rte.php',
	                )
	            )
	        )
		),
		'answers' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_question.answers',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_simplequiz_domain_model_answer',
				'foreign_field' => 'question',
				'maxitems'      => 9999,
				'minitems'		=> 0,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
				),
			)
		),
	),
);

$TCA['tx_simplequiz_domain_model_answer'] = array(
	'ctrl' => $TCA['tx_simplequiz_domain_model_answer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'answer,correct'
	),
	'types' => array(
		'1' => array('showitem' => 'answer,correct')
	),
	'palettes' => array(
		'1' => array()
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_simplequiz_domain_model_answer',
				'foreign_table_where' => 'AND tx_simplequiz_domain_model_answer.uid=###REC_FIELD_l18n_parent### AND tx_simplequiz_domain_model_answer.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'answer' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_answer.answer',
			'config'  => array(
				'type' => 'text',
				'cols' => 80,
				'eval' => 'trim,required'
			)
		),
		'correct' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:simplequiz/Resources/Private/Language/locallang_db.xml:tx_simplequiz_domain_model_answer.correct',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'question' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
	),
);


?>