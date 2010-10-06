<?php
class Debug {
	/**
	 * Log an exception to the system log.
	 * 
	 * @param Exception $e
	 * @return bool Returns true on success, false on failure.
	 */
	public static function logException( $e) {
		$data = "\n" . str_repeat('-', 80) . "\n" . $e->__toString() . "\n" . str_repeat('-', 80) . "\n";
		return self::log($data);
	}
	/**
	 * Write an entry to the system log.
	 * @param string $data
	 * @return bool Returns true on success, false on failure.
	 */
	public static function log($data) {
		return error_log($data);
	}
	/**
	 * Fancy 'print_r' routine.
	 * @param mixed $expression
	 * @return int|string
	 */
	public static function print_r($expression, $return = false) {
		$result = '';
		
		if ($return) {
			$result = print_r($expression, $return);
		} else {
			ob_start();
			echo '<pre>';
			$result = print_r($expression);
			echo '</pre>';
			$output = ob_get_clean();
			
			echo $output;
		}
		
		return $result;
	}
	/**
	 * Fancy 'var_dump' routine.
	 * @param $expression
	 * @param $return
	 * @return string|null
	 */
	public static function var_dump($expression , $return = false) {
		ob_start();
			echo '<pre>';
			var_dump($expression);
			echo '</pre>';
		$output = ob_get_clean();
		
		if ($return) {
			return $output;
		} else {
			echo $output;
			return null;
		}
	}
	
	public static function microTime() {
		if (PHP_MAJOR_VERSION >= 5) {
			return microtime(true);
		} else {
			list($usec, $sec) = explode(" ", microtime());
    		return ((float)$usec + (float)$sec);
		}
	}
	/**
	 * Send the specified content to the current administrative e-mail
	 * @param $content
	 */
	public static function mail($content) {
		
		return mail($_SERVER["SERVER_ADMIN"], 'Debug message', $content, "From: zrecommerce@localhost\n");
	}
}