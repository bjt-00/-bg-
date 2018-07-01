<?php
 class Security{
 	
 	function encrypt($string){
 		return $this->encryptDecrypt($string,'e');
 	}
 	
 	function decrypt($string){
 		return $this->encryptDecrypt($string,'d');
 	}
 	
 	function encryptDecrypt($string,$action){
 		$secret_key = 'my_simple_secret_key';
 		$secret_iv = 'my_simple_secret_iv';
 		
 		$output = false;
 		$encrypt_method = "AES-256-CBC";
 		$key = hash( 'sha256', $secret_key );
 		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 		
 		if( $action == 'e' ) {
 			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
 		}else if( $action == 'd' ){
 			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
 		}
 		return $output;	
 	}
 }
?>