<?php

class PHP_Validate_Password {

	protected $password;
	
	public $strength;

	public $hasWhitespace;

	public function __construct( $password )
	{
		$this->password = $password;
		$this->hasWhitespace = $this->checkWhiteSpace();
		$this->strength = 0;
		$this->strength = $this->getStrength();
	}

	public function getStrength()
	{
		return $this->strength + $this->checkLength() + $this->checkMixedCase() + $this->checkDigits() + $this->checkSpecialChars();
	}

	private function checkLength( $length = 8 )
	{
		return ( empty( $this->password ) || (strlen( $this->password ) < $length ) ) ? 0 : 1;
	}

	private function checkMixedCase()
	{
		return ( preg_match( '/[a-z]+/', $this->password ) && preg_match( '/[A-Z]+/', $this->password ) ) ? 1 : 0;
	}

	private function checkDigits()
	{
		return ( preg_match( "/\d/", $this->password ) ) ? 1 : 0;
	}

	private function checkSpecialChars()
	{
		return ( preg_match( "/[^a-zA-Z\d]/", $this->password ) ) ? 1 : 0;
	}

	private function checkWhiteSpace()
	{
		return (preg_match("/\s/", $this->password));
	}
	
}