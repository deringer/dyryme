<?php namespace Dyryme\Validators;

/**
 * Generic validation failed exception
 *
 * @package    Dyryme
 * @subpackage Validators
 * @copyright  2015 IATSTUTI
 * @author     Michael Dyrynda <michael@iatstuti.net>
 */

class ValidationFailedException extends \Exception {

	protected $errors = [ ];


	/**
	 * @param array $errors
	 */
	function __construct(array $errors)
	{
		$this->errors = $errors;
	}


	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}


}
