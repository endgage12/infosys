<?php 
    //PHPExcel
    require_once 'config.php';
    require_once 'functions.php';
    require_once('PHPExcel.php');
    require_once('PHPExcel/Writer/Excel5.php');

    $price_list = get_price();

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $active_sheet = $objPHPExcel->getActiveSheet();

    //Ориентация страницы и  размер листа
    $active_sheet->getPageSetup()
        ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    $active_sheet->getPageSetup()
        ->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    //Поля документа 
    $active_sheet->getPageMargins()->setTop(1);
    $active_sheet->getPageMargins()->setRight(0.75);
    $active_sheet->getPageMargins()->setLeft(0.75);
    $active_sheet->getPageMargins()->setBottom(1);
    //Название листа
    $active_sheet->setTitle("Инвентарный документ"); 
    //Шапа и футер 
    $active_sheet->getHeaderFooter()->setOddHeader("&CШапка"); 
    $active_sheet->getHeaderFooter()->setOddFooter('&L&B'.$active_sheet->getTitle().'&RСтраница &P из &N');
    //Настройки шрифта
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

    //Создаем шапку таблички данных
    $active_sheet->setCellValue('A6','Инвентарный номер');
    $active_sheet->setCellValue('B6','Фирма');
    $active_sheet->setCellValue('C6','Модель');
    $active_sheet->setCellValue('D6','Аудитория');
    $active_sheet->setCellValue('E6','Дата приобретения');
    $active_sheet->setCellValue('F6','Дата ввода в эксплуатацию');
    $active_sheet->setCellValue('G6','Дата начала ремонта');
    $active_sheet->setCellValue('H6','Амортизация в годах');
    $active_sheet->setCellValue('I6','Ответственное лицо');
    $active_sheet->setCellValue('J6','Статус');

    //В цикле проходимся по элементам массива и выводим все в соответствующие ячейки
    $row_start = 7;
    $i = 0;
    foreach($price_list as $item) {
    $row_next = $row_start + $i;
    
    $active_sheet->setCellValue('A'.$row_next,$item['temp0']);
    $active_sheet->setCellValue('B'.$row_next,$item['firm']);
    $active_sheet->setCellValue('C'.$row_next,$item['model']);
    $active_sheet->setCellValue('D'.$row_next,$item['room']);
    $active_sheet->setCellValue('E'.$row_next,$item['dateBuy']);
    $active_sheet->setCellValue('F'.$row_next,$item['dateExpl']);
    $active_sheet->setCellValue('G'.$row_next,$item['dateRepair']);
    $active_sheet->setCellValue('H'.$row_next,$item['yearAmortis']);
    $active_sheet->setCellValue('I'.$row_next,$item['person']);
    $active_sheet->setCellValue('J'.$row_next,$item['status']);
    
    $i++;
    }

    //конец
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=simple.xls");

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');

    exit();
?>
