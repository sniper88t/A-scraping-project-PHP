<?PHP
include 'condb.php';

	$getQuery = mysqli_query($conn,"SELECT * FROM `itemurl` WHERE `checked` = 0");

	while($row = mysqli_fetch_assoc($getQuery)){

		//Get Product Details
		$url= $row['url'];
		$html=file_get_contents($url);
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);

		$getTitle=$xpath->query("//div[@id='pb-left-column']/h1");
		$title = $getTitle[0]->textContent;
		$getImg = $xpath->query("//a[@class='MagicZoomPlus']/@href");
		$img = $getImg[0]->textContent;
		$getPrice = $xpath->query("//span[@id='our_price_display']");
		$price = str_replace('Winning Bid: £', '', $getPrice[0]->textContent);
		$price = str_replace('Winning Bid: Â£', '', $price);
		$price = str_replace('Final Bid: Â£', '', $price);
		$getRegion = $xpath->query("//ul[@id='idTab2']/li[4]");
		$region = str_replace('Region: ','',$getRegion[0]->textContent);
		$getStatus = $xpath->query("//ul[@id='idTab2']/li[7]");
		$status = str_replace('Lot Type: ','',$getStatus[0]->textContent);
		$getType = $xpath->query("//ul[@id='idTab2']/li[6]");
		$type = str_replace('Cask Type: ','',$getType[0]->textContent);
		$getSize = $xpath->query("//ul[@id='idTab2']/li[2]");
		$size = str_replace('Bottle Size: ','',$getSize[0]->textContent);
		$getStrength = $xpath->query("//ul[@id='idTab2']/li[1]");
		$strength = str_replace('Strength: ','',$getStrength[0]->textContent);
		$getSold  = $xpath->query("//div[@id='auction_block']/div[@class='product_attributes']/p[2]");
		$sold = str_replace('End date: ','',$getSold [0]->textContent);
		$getDesc = $xpath->query("//div[@id='short_description_content']/p");
		$desc = $getDesc[0]->textContent;
		$description = strip_tags($desc);
		
		mysqli_query($conn,"INSERT INTO `products` (`id`, `Title`, `Image`, `PriceGBP`, `Region`, `Status`, `Type`, `Size`, `Strength`, `url`, `SoldOn`, `description`) VALUES (NULL, '".$title."', '".$img."', '".$price."', '".$region."', '".$status."', '".$type."', '".$size."', '".$strength."', '".$url."', '".$sold."', '".$description."');");
		$id = $row['id'];

		mysqli_query($conn,"UPDATE `itemurl` SET `checked` = '1' WHERE `itemurl`.`id` = ".$id.";");
		
		sleep(1);
	}
	
	