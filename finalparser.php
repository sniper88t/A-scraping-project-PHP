<?PHP
include 'condb.php';

    $getQuery = mysqli_query($conn,"SELECT * FROM `itemurl` WHERE `checked` = 0");

    while($row = mysqli_fetch_assoc($getQuery)){

        //Get Product Details
        $url= $row['url'];
        echo $url;
        $html=file_get_contents($url);
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);

        $nodelist = $xpath->query("//div[@class='pages']/a/@href");
        $node_counts = $nodelist->length / 2; // count how many nodes returned
        //echo $node_counts;

        foreach ($xpath->query("//div[@class='pages']/a/@href") as $href){
            $itemurl = $href->textContent;

            if($itemurl == NULL){
                echo "no Item";
            }else{
                //echo "https://www.scotchwhiskyauctions.com/".$itemurl;
                $itemurl = "https://www.scotchwhiskyauctions.com/".$itemurl;

                $htmlnode = file_get_contents($itemurl);
                $domnode = new DOMDocument();
                libxml_use_internal_errors(true);
                $domnode->loadHTML($htmlnode);
                $xpath = new DOMXPath($domnode);

                $listprod = $xpath->query("//a[@class='prodbox']/@href");
                $prod_counts = $listprod->length; // count how many nodes returned

                $listfinal = $xpath->query("//a[@class='prodbox finalbox']/@href");
                $final_counts = $listfinal->length; // count how many nodes returned

                $node_counts = $prod_counts + $final_counts;
                echo $node_counts;

                foreach ($xpath->query("//a[@class='prodbox']/@href") as $href){
                    $itemurl = $href->textContent;

                    if($itemurl == NULL){

                    }else{
                        $fullurl = "https://www.scotchwhiskyauctions.com/".$itemurl;
                        echo $fullurl;
                        insertdata($fullurl);
                        //mysqli_query($conn,"INSERT INTO `urlstore` (`id`, `urls`, `checked`) VALUES (NULL, '".$fullurl."', '0');");
                    }
                }

                foreach ($xpath->query("//a[@class='prodbox finalbox']/@href") as $href){
                    $itemurl = $href->textContent;

                    if($itemurl == NULL){

                    }else{
                        $fullurl = "https://www.scotchwhiskyauctions.com/".$itemurl;
                        echo $fullurl;
                        insertdata($fullurl);
                        //mysqli_query($conn,"INSERT INTO `urlstore` (`id`, `urls`, `checked`) VALUES (NULL, '".$fullurl."', '0');");
                    }
                }


            }
        }


        sleep(1);
    }


    function insertdata($urlparam) {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db = "parser";

        // Create connection
        $conn = new mysqli($hostname, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            echo "DB Connected!";
        }
        /* select db */
        mysqli_select_db($conn, $db);

        $url= $urlparam;
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
    }