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
 * Controller for the Question object
 *
 * @version $Id: $
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_Simplequiz_Controller_QuestionController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_Simplequiz_Domain_Repository_QuestionRepository
	 */
	protected $questionRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {		
		$this->questionRepository = t3lib_div::makeInstance('Tx_Simplequiz_Domain_Repository_QuestionRepository');	
		$this->answerRepository = t3lib_div::makeInstance('Tx_Simplequiz_Domain_Repository_AnswerRepository');	
	}
	
	/**
	 * list action - renders a list of questions as a quiz form
	 *
	 * @return string The rendered list action
	 */
	public function listAction() {
		//the maximum questions to be displayed, can be set via flexform (default 10)
	    $maxQuestions = $this->settings['maxQuestions'];
	    
	    //fetches random questions from db
		$questions = $this->questionRepository->findRandomWithLimit($maxQuestions);
		
		//adds the count of correct answers to the question 
		//TODO: move to model
		foreach($questions as $questionNumber => $question) {
			$answers = $question->getAnswers();
			foreach($answers as $answer) {
				if($answer->isCorrect()) {
					$questions[$questionNumber]->correctAnswerCount += 1; 
				} 
			}	
				
		}
		$this->view->assign('questions', $questions);		
	}
	
	/**
	 * evaluate action - evaluates the quiz
	 *
	 * @return string The rendered list action
	 */	
	public function evaluateAction() {
		$correctAnswers = Array();
		
		//only evaluate if at least one question was answered
		if($this->request->hasArgument('question')) {
			//get the questions and answers the user submitted
    		$questionsAndAnswers = $this->request->getArgument('question');
    		//only the question ids
    		$questionsAsked = array_keys($questionsAndAnswers);
    		//fetch the full question objects from db
    		$questionsAskedComplete = $this->questionRepository->findAllByUid($questionsAsked);
    		//storage for a counter of correctly given answers
    		$correctlyGivenAnswers = 0;
    		
    		//loop through the questions and compare the answers
    		foreach($questionsAndAnswers as $askedQuestion => $givenAnswer) {
    			//fetch the correct answers of the question (and the correct only!)
				$correctAnswers = $this->answerRepository->findCorrectAnswersToQuestions($askedQuestion);

				//compare the correct answers and the given ones with array_diff (first array_diff compares if there are correct answers, the user has not selected
				//the second one compares if there are wrong answers selected)
				if(array_diff($correctAnswers, $questionsAndAnswers[$askedQuestion]) || array_diff($questionsAndAnswers[$askedQuestion], $correctAnswers)) {
					//if a wrong answer was selected (or a correct missing) set the state of the question to error
					//TODO: move to model?
					$questionsAskedComplete[$askedQuestion]->state = 'error';
					//fetches the full answer objects so we can assign a state to each
					$answers = $questionsAskedComplete[$askedQuestion]->getAnswers();
					//new storage for the answers
					$cleanedAnswers = new Tx_Extbase_Persistence_ObjectStorage();
					foreach($answers as $answer) {
						//if this answer was one selected by the user set the state to "yousaid"
						if(in_array($answer->getUid(), $questionsAndAnswers[$askedQuestion])) {
							$answer->state = 'yousaid';
						}
						$cleanedAnswers->attach($answer);
					}
					//write the answers with state information back into the question object
					$questionsAskedComplete[$askedQuestion]->setAnswers($cleanedAnswers);
				} else {
					//if the given answers were correct set the state to correct and increase the correct answer counter
					$questionsAskedComplete[$askedQuestion]->state = 'correct';
					$correctlyGivenAnswers += 1;
				}
    		}

			$questionCount = count($questionsAsked); //questions asked
			$correctAnswerCount = $correctlyGivenAnswers; //correctly answered questions
			$correctPercentage = round($correctAnswerCount / $questionCount * 100);	//correctly answered questions in percent
			
			//assign variables to the view
			$this->view->assign('questionCount', $questionCount);
			$this->view->assign('correctAnswerCount', $correctAnswerCount);
			$this->view->assign('correctPercentage', $correctPercentage);
			$this->view->assign('questions', $questionsAskedComplete);
		} else {
			//if no question was answered redirect back to list view
		    $this->redirect('list');
		}
	}
	
}
?>
