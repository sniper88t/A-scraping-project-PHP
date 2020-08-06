<?PHP
include 'condb.php';

    //Get Product Details
    $url= "https://www.scotchwhiskyauctions.com/auctions/151_the-110th-auction/395229_a-dream-of-scotland-15-year-old-cigar-malt-3rd-edition-oloroso--px-casks/";
    $html=file_get_contents($url);
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Get title
    $getTitle=$xpath->query("//div[@class='headwrap']/h1");
    $title = $getTitle[0]->textContent;
    // Get price
    $getPrice = $xpath->query("//span[@class='price']");
    $price = $getPrice[0]->textContent;
    // Get ProductDescription
    $getEdition = $xpath->query("//div[@class='productdescription']/p");
    $node_counts = $getEdition->length;

    $edition = "";
    $age = "";
    $casktype = "";
    $strength = "";
    $size = "";

    for ($x = 0; $x < $node_counts; $x++) {
        //get edition
        $getedition = strstr($getEdition[$x]->textContent, 'Edition');
        if(strlen($getedition) > 0){
            $edition = substr($getedition, 8);
        }
        //get age
        $getage = strstr($getEdition[$x]->textContent, 'Age:');
        if(strlen($getage) > 0){
            $age = substr($getage, 4);
        }
        //get casktype
        $getcasktype = strstr($getEdition[$x]->textContent, 'Cask Type:');
        if(strlen($getcasktype) > 0){
            $casktype = substr($getcasktype, 10);
        }

        $cond = strstr($getEdition[$x]->textContent, 'ABV', true);
        if(strlen($cond) > 0){
            $strength = strstr($getEdition[$x]->textContent, '/', true);
            $size = strstr($getEdition[$x]->textContent, '/', false);
            $size = substr($size, 2);
        }

    }

    // Get ProductDescription
    $getsoldon = $xpath->query("//div[@class='lotno lotfeatured']");
    $soldon = strstr($getsoldon[0]->textContent, ' – ', false);
    $soldon = substr($soldon,4);

    // Get Image Url
    $anchors = $dom -> getElementsByTagName('img');
//    foreach ($anchors as $element) {
//        $src = $element -> getAttribute('src');
//        //echo $src;
//    }
    $image = $anchors->item(0)->getAttribute('src');

//    $getproductimg = $xpath->query("//img[@id='productimg]");
//    $productimg =  $getproductimg->item(0)->getAttribute('src');
//    echo $productimg;

    echo $title, $price, $edition, $age, $casktype, $strength, $size, $soldon, $image, $url;

    $title = utf8_encode($title);
    echo $title;
    mysqli_query($conn,"INSERT INTO `aproduct` (`id`, `title`, `price`, `edition`, `age`, `casktype`, `strength`, `size`, `soldon`, `image`, `url`) VALUES (NULL, '".$title."', '".$price."', '".$edition."', '".$age."', '".$casktype."', '".$strength."', '".$size."', '".$soldon."', '".$image."', '".$url."');");

    sleep(1);

