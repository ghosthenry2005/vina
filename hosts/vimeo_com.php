<?php

class dl_vimeo_com extends Download {
	public $vimeoQualityPrioritet = array('720p', '540p', '360p' , '270p');
	public function FreeLeech($url) {
		$count = 1;
		$url = str_replace("http://", "https://", $url, $count);
		if(preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',$url,$matches))
		{
			$id = $matches[2];
			$url="https://player.vimeo.com/video/".$id;
			$data = $this->lib->curl($url);
			$re = "/,\"url\":\"(.+?mp4.+?expires.+?token.+?)\"/";
            if(preg_match($re, $data, $matches))
            {
				/*$videoInfo = json_decode($matches[1]);
				$videoObject=$this->getVimeoQualityVideo($videoInfo->request->files);
				/*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
				fwrite($myfile, $matches[1]);
				fclose($myfile);
				$this->lib->reserved['filename'] = $this->getVimeoVideoTitle($videoInfo).".".$this->getVimeoVideoExtension($videoObject->url);
				*/
				$flink= trim($matches[1]);
				$re = "/title\":\"(.+?)\",\"url/";
				if(preg_match($re, $data, $matches))
				{
					$this->lib->reserved['filename'] =$matches[1].".mp4";
				}
				return $flink;
			}
		}
		return false;
	}
}

/*
* Open Source Project
* Vinaget by ..::[H]::..
* Version: 2.7.0
* Youtube.com Download Plugin by giaythuytinh176 [3.8.2013][18.9.2013][Fixed Filename]
* Translate from youtube plugin by Th3-822. 
* Downloader Class By [FZ]
*/
?>
