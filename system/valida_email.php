<?php
class Validacao {
	public function valida_email($email)
	{
		// Remove os caracteres ilegais, caso tenha
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Valida o e-mail
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid = true;
		} else {
			$valid = false;
		}
		return $valid;
	}
}
?>