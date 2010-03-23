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
 * Represents an answer
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Simplequiz_Domain_Model_Answer extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The answer possibility
	 * @var string
	 * @validate NotEmpty
	 */
	protected $answer;
	
	/**
	 * Is this a correct answer?
	 * @var boolean
	 */
	protected $correct;
	/**
	 * The explanation of the answer
	 * @var string
	 */
	protected $explanation;
	
	
	
	/**
	 * Setter for answer
	 *
	 * @param string $answer The answer possibility
	 * @return void
	 */
	public function setAnswer($answer) {
		$this->answer = $answer;
	}

	/**
	 * Getter for answer
	 *
	 * @return string The answer possibility
	 */
	public function getAnswer() {
		return $this->answer;
	}
	
	/**
	 * Setter for correctAnswer
	 *
	 * @param boolean $correct Is this a correct ?
	 * @return void
	 */
	public function setCorrect($correct) {
		$this->correct = $correct;
	}

	/**
	 * Getter for correctAnswer
	 *
	 * @return boolean Is this a correct answer?
	 */
	public function getCorrect() {
		return $this->correct;
	}
	
	/**
	 * Returns the boolean state of correctAnswer
	 *
	 * @return bool The state of correctAnswer
	 */
	public function isCorrect() {
		return $this->getCorrect();
	}
	
	/**
	 * Setter for explanation
	 *
	 * @param string $explanation The explanation of the answer
	 * @return void
	 */
	public function setExplanation($explanation) {
		$this->explanation = $explanation;
	}

	/**
	 * Getter for explanation
	 *
	 * @return string The explanation of the answer
	 */
	public function getExplanation() {
		return $this->explanation;
	}
	
}
?>