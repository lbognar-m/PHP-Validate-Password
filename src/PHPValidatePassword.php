<?php

class PHP_Validate_Password {

	protected $password;
	
	protected $strength;

	public $hasWhitespace;

	public function __construct( $password )
	{
		$this->password = $password;
		$this->hasWhitespace = $this->checkWhiteSpace();
		$this->strength = 0;
	}

	public function getStrength()
	{
		
		$this->strength += $this->checkLength() + $this->checkMixedCase() + $this->checkDigits() + $this->checkSpecialChars();
		
		return $this->strength;

	}

	private function checkLength( $length = 8 )
	{
		if ( empty( $this->password ) || (strlen( $this->password ) < $length )) {
			return 0;
		} else {
			return 1;
		}
	}

	private function checkMixedCase()
	{
		if (preg_match('/[a-z]+/', $this->password) && preg_match('/[A-Z]+/', $this->password)) {
			return true;
		} else {
			return false;
		}
	}

	private function checkDigits()
	{
		if (preg_match("/\d/", $this->password)) {
			return 1;
		} else {
			return 0;
		}
	}

	private function checkSpecialChars()
	{
		if (preg_match("/[^a-zA-Z\d]/", $this->password)) {
			return true;
		} else {
			return false;
		}
	}

	private function checkWhiteSpace()
	{
		if (preg_match("/\s/", $this->password)) {
			return true;
		} else {
			return false;
		}
	}
	
}