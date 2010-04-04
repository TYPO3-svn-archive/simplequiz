<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Susanne Moog <s.moog@neusta.de>, NEUSTA GmbH
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The main question object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Simplequiz_Domain_Model_Question extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The question
	 * @var string
	 * @validate NotEmpty
	 */
	protected $question;
	
	/**
	 * An explanation for the question (additional infos)
	 * @var string
	 */
	protected $explanation;
	
	/**
	 * answers
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Simplequiz_Domain_Model_Answer>
	 */
	protected $answers;
	
	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->answers = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Setter for question
	 *
	 * @param string $question The question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * Getter for question
	 *
	 * @return string The question
	 */
	public function getQuestion() {
		return $this->question;
	}
	
	/**
	 * Setter for explanation
	 *
	 * @param string $explanation An explanation for the question (additional infos)
	 * @return void
	 */
	public function setExplanation($explanation) {
		$this->explanation = $explanation;
	}

	/**
	 * Getter for explanation
	 *
	 * @return string An explanation for the question (additional infos)
	 */
	public function getExplanation() {
		return $this->explanation;
	}
	
	/**
	 * Setter for answers
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Simplequiz_Domain_Model_Answer> $answers answers
	 * @return void
	 */
	public function setAnswers(Tx_Extbase_Persistence_ObjectStorage $answers) {
		$this->answers = $answers;
	}

	/**
	 * Getter for answers
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Simplequiz_Domain_Model_Answer> answers
	 */
	public function getAnswers() {
		return $this->answers;
	}
	
	/**
	 * Adds a Answer
	 *
	 * @param Tx_Simplequiz_Domain_Model_Answer The Answer to be added
	 * @return void
	 */
	public function addAnswer(Tx_Simplequiz_Domain_Model_Answer $answer) {
		$this->answers->attach($answer);
	}
	
	/**
	 * Removes a Answer
	 *
	 * @param Tx_Simplequiz_Domain_Model_Answer The Answer to be removed
	 * @return void
	 */
	public function removeAnswer(Tx_Simplequiz_Domain_Model_Answer $answer) {
		$this->answers->detach($answer);
	}
	
}
?>