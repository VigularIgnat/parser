<?php
    session_start();
    //$_SESSION["file_num"]=0;
    $url="https://auto.ria.com/uk/search/";
    $max_price=10000;
    $year_car=2013;
    $count=400;
    $param="categories.main.id=1&price.currency=1&price.USD.lte=".$max_price."&indexName=auto,order_auto,newauto_search&brand.id[0]=33&year[0].gte=".$year_car."&size=".$count;
    $content=file_get_contents($url."?".$param);
    //echo $content;
    $car=[];
    $cars=[];

    $block_marka1='<a class="m-link-ticket" href="';
    
    $array_keywords = array('<a class="m-link-ticket" href="' => '"></a>', '<span class="blue bold">' => '</span>', '</span>'=> '</a>',
     '<div class="price-ticket" data-main-currency="USD" data-main-price="' => '"> ', 
     '<i class="icon-mileage" title="Пробіг"></i>'=>'</li>');
    $n_keys=count($array_keywords);
    $block_url='<a class="m-link-ticket" href="';    
    $block_price='<div class="price-ticket" data-main-currency="USD" data-main-price="';
    /*$block_delete= '{markName} {modelName} {version}cation js-location"> {cityName}';
    
    $content=str_replace($block_delete, '', $content);
    str_replace($content, '', $block_delete);
    
    
    //preg_replace(''.$block_delete.'', '', $content);
    $pos_delete=stripos($content, $block_delete)+strlen($block_delete);
    echo $pos_delete;*/

    while(strpos($content, $block_marka1)!=-1 ||stripos($content, $block_url)!=-1 ||stripos($content, $block_price)!=-1){
        //URL
        //
        $block_marka1='data-link-to-view="';
        $pos_marka1=stripos($content, $block_marka1)+strlen($block_marka1);
        $content=substr($content,$pos_marka1);
        $block_marka2='"';
        $pos_marka2=stripos($content, $block_marka2);
        $url=substr($content,0, $pos_marka2);
        //echo $url;
        //MARKA
        
        $block_marka1='" data-mark-name="';
        $pos_marka1=stripos($content, $block_marka1)+strlen($block_marka1);
        $content=substr($content,$pos_marka1);
        $block_marka2='"';
        $pos_marka2=stripos($content, $block_marka2);
        $marka=substr($content,0, $pos_marka2);
        //echo $marka;
        

        //MODEL CAR

        $block_marka1='data-model-name="';
        $pos_marka1=stripos($content, $block_marka1)+strlen($block_marka1);
        $content=substr($content,$pos_marka1);
        $block_marka2='"';
        $pos_marka2=stripos($content, $block_marka2);
        $model=substr($content,0, $pos_marka2);
        //echo $model;
        

        /*if ($marka=='{markName} {modelName} {version}'){
            break;
        }*/
        
        //echo $marka;
        //YEAR CAR
        
        $block_marka2='data-year="';
        $pos_year=stripos($content, $block_marka2)+strlen($block_marka2); 
        $content=substr($content, $pos_year);
        $block_year2='"';
        $pos_marka2=stripos($content, $block_year2);
        $year=substr($content,0, $pos_marka2);
        //echo $year;

        

        //PRICE

        $block_price='<div class="price-ticket" data-main-currency="USD" data-main-price="';
        $pos_price=stripos($content, $block_price)+strlen($block_price);
        $content=substr($content, $pos_price);
        $block_price2='">';
        $pos_price2=stripos($content, $block_price2);
        $price=substr($content,0, $pos_price2);
        //echo $price;
        

        $block_price='<li class="item-char js-race"><i class="icon-mileage" title="Пробіг"></i>';
        $pos_price=stripos($content, $block_price)+strlen($block_price);
        $content=substr($content, $pos_price);
        $block_price2='тис. км </li>';
        $pos_price2=stripos($content, $block_price2);
        $mileage=substr($content,0, $pos_price2);
        //echo $mileage;
        if ($marka=='{markName}'|| $url=="https://auto.ria.com/uk{linkToView}" || $model=="{modelName}" ||$year=="{years}" || $price==' evel-expire-date="{levelExpireDate}" >'){
            break;
        }
        //echo $price;
        //echo $url;
        //echo $mileage;
        array_push($car, $url);
        array_push($car, $marka);
        array_push($car, $model);
        array_push($car, $year);
        array_push($car, $price);
        array_push($car, $mileage);
    }
    $num_file=$_SESSION["file_num"];
    array_push($cars,$car);
    //$len_cars=count($cars);
    $fp = fopen('file'.$num_file.' .csv', 'w');
    
    $n_car_object=count($cars[0]);
    foreach ($cars as $fields) {
        fputcsv($fp, $fields, "\n");
        
    }
    $file='file'.$num_file.' .csv';
    fclose($fp);
    $_SESSION["file_num"]++;
    //echo $_SESSION["file_num"]++;

?>