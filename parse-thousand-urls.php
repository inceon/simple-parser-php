<?php 

    set_time_limit(0);
    header('Content-Type: text/html; charset=utf-8');
    include('simple_html_dom.php');
    
    $file = fopen("output.txt", "w");
    
    // Цикл по каждой странице
    for($i = 1; $i <= 100; $i++) {

        // Получаем html код страницы
    	$html = file_get_html(
    	    'https://www.e-olymp.com/ru/problems/' . $i    
    	);
    	
    	
    	if(is_object($html)) {
        	// Парсим название задачи
        	// h1               -> название тега где лежит нужное название
        	// eo-title__header -> html класс названия
        	foreach($html->find('h1.eo-title__header') as $name) {
        	    
        	    // запись названия в файл
        	    fwrite($file, $name->plaintext . "\n");
        	}
    	}
    	
    	
    }
    
    fclose($file);