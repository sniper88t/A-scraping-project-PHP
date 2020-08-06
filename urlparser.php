<?PHP 
include 'condb.php';
	

//Get Items From Page

		$url="https://www.scotchwhiskyauctions.com/auctions/";
		$html=file_get_contents($url);
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
			foreach ($xpath->query("//a[@class='prodbox']/@href") as $href){
				$itemurl = $href->textContent;
				
				if($itemurl == NULL){

				}else{
				    $fullurl = "https://www.scotchwhiskyauctions.com/".$itemurl;
				    echo $fullurl;
					mysqli_query($conn,"INSERT INTO `itemurl` (`id`, `url`, `checked`) VALUES (NULL, '".$fullurl."', '0');");
				}
			}
            foreach ($xpath->query("//a[@class='prodbox finalbox']/@href") as $href){
                $itemurl = $href->textContent;

                if($itemurl == NULL){

                }else{
                    $fullurl = "https://www.scotchwhiskyauctions.com/".$itemurl;
                    echo $fullurl;
                    mysqli_query($conn,"INSERT INTO `itemurl` (`id`, `url`, `checked`) VALUES (NULL, '".$fullurl."', '0');");
                }
            }

		sleep(1);
