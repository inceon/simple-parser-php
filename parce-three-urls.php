<?php 

    header('Content-Type: text/html; charset=utf-8');
    include('simple_html_dom.php');
    
    $sitesToCheck = array(
    					'https://www.e-olymp.com/ru/problems/5',
        				'https://www.e-olymp.com/ru/problems/10',
        				'https://www.e-olymp.com/ru/problems/15'
    				);
    				
    $resultFule = "output.txt";
    
    // Цикл по каждой странице
    foreach($sitesToCheck as $siteUrl) {

    	// Получаем html код страницы
    	$html = file_get_html($siteUrl);
    	
    	sleep(1);
    	// Парсим название товара
    	foreach($html->find('h1.eo-title__header') as $name) {
    		echo $name; 
    	}
    	
    }