<?php
/*
Program Name: sm00sh Processor Library
Program URI: http://smsh.me/action/api
Description: A lib to be used by external plugins in order to converts all URLs in a text into shorten URLs using the sm00sh service at http://smsh.me.
Author: Lopo Lencastre de Almeida <dev@ipublicis.com>, Copyright 2009  
Version: 1.0 
Author URI: http://www.ipublicis.com
License: GNU LGPL v3 or later
*/

/**
Class sm00sher
main class section.
*/
class smsh {

	/**
	smsh_parse
	this function search the content for http links and then convert them to sm00sh'ed ones.
	
	@param string $content the original content
	@return string $content the modified content
	*/
	public function smsh_parse($content)
	{
		$urls = $this->_smsh_all_links($content);
		foreach ($urls as $url) {
			$content = str_ireplace($url['bigurl'], $url['smsh'], $content);
		}
		return $content;
	}

	/**
	_smsh_all_links
	get all content's URLs using native PHP DOM and sends them for processing.

	@param string $content the content to process
	@return array $urls the array containing the original and the sm00s'ed URLs
	*/
	protected function _smsh_all_links($content) 
	{

		$urls = array();

		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = FALSE;
		@$dom->loadHTML($content);

		$atags = $dom->getElementsByTagName('a');
		foreach ($atags as $atag) {
			$the_url = $atag->getAttribute('href');
			$new_url = $this->_smsh_process($the_url);
			$urls[] = array( 'bigurl' => $the_url, 'smsh' => $new_url );
		}
	
		return($urls);
	}

	/**
	_smsh_process
	this function sends the original URL to sm00sh and returns a shorten new one. Requires cURL and SimpleXML.

	@param string $url the source url
	@return string $surl the shorten url or, on error, the original unmodified one
	*/
	protected function _smsh_process($url)
	{
		$surl = $url;

		if($this->_valid_url($url))  // URLs *MUST* be valid ones 
		{
			$sm00sher = 'http://smsh.me/?api=xml&url='.$url;
	
			$curl_handle=curl_init();
			curl_setopt($curl_handle,CURLOPT_URL,$sm00sher);
			curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
			curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);

			if (!empty($buffer))
			{
				$xml = @simplexml_load_string($buffer);
				if (isset($xml)) 
				{
					$title = @trim($xml->title);
					$body  = @trim($xml->body);
					if( $title == 'HTTP/1.0 200 OK' && !empty($body) ) 
					{
						$surl = $body;
					}
				}
			}
		}

		return $surl;
	}

	/**
	_valid_url
	check if a URL string is valid or not
	
	@param string $url the source url
	@return bollean $is_url true of is valid or false if it isn't
	*/
	protected function _valid_url($url)
	{
		return ( ! preg_match('/^(http|https|ftp|sftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) ? FALSE : TRUE;
	}

} // EOF
?>
