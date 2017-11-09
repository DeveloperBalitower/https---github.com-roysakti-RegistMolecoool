<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excel {

    private $excel;

    public function __construct() {
        require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
        $this->excel = new PHPExcel();
    }

    public function load($path) {
        $inputFileType = PHPExcel_IOFactory::identify($path);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $this->excel = $objReader->load($path);
        return $this->excel;
    }

    public function save($path) {
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save($path);
    }

    public function stream($filename, $data = null) {
        if ($data != null) {
            $col = 'A';            
            $styleArray = array(
			
                'font'  => array(
                    'color' => array('rgb' => '000000'),
                    'bold'  => true
                    //'size'  => 15,
                    //'name'  => 'Verdana'
                ),                
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'EEEEEE')
                ),                
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),              
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel_RichText();
                $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
                $this->excel->getActiveSheet()->getCell($col . '1')->setValue($objRichText);
                $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                $this->excel->getActiveSheet()->getStyle($col . '1')->applyFromArray($styleArray);
                $col++;
            }
            $rowNumber = 2;
            
                    
            $styleArray = array(          
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            
            foreach ($data as $row) 
            {
                $col = 'A';
                foreach ($row as $cell) {
                    $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                    $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                    $this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                    $col++;
                }
                $rowNumber++;
            }
        }
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }
	
	public function stream_laporan_transaksi($filename, $data = null) {
        if ($data != null) {
            $col = 'A';            
            $styleArray = array(			
                'font'  => array(
                    'color' => array('rgb' => '000000'),
                    'bold'  => true
                ),                
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'EEEEEE')
                ),                
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),              
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel_RichText();
                $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
                $this->excel->getActiveSheet()->getCell($col . '1')->setValue($objRichText);
                $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col . '1')->applyFromArray($styleArray);
                $col++;
            }
            $rowNumber = 2;
                    
            $styleArray = array(   		
                'font'  => array(
                    'color' => array('rgb' => '000000')
                ),             
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            
            $styleArray_merah = array(   		
                'font'  => array(
                    'color' => array('rgb' => 'FF0000')
                ),             
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
			
            $styleArray_hijau = array(   		
                'font'  => array(
                    'color' => array('rgb' => '32CD32')
                ),           
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
			
            foreach ($data as $row) 
            {
                $col = 'A';
                foreach ($row as $cell) {
                    $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                    $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);					
				
					if($col == 'A' || $col == 'B' || $col == 'C')
					{	
						$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);				
					}
					else
					{
						if($cell < 0)
							$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray_merah);
						else
							$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray_hijau);
					}
                    $col++;
                }
                $rowNumber++;
            }
        }
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }
	
	public function stream_with_header($filename, $data = null, $header = null) 
	{
		$rowNumber  = 1;
		if($header != null)
		{
            $col = 'A'; 
		
			$imp = implode(",", $header);
			$exp = explode(",", $imp);
					
			foreach($exp as $cell)
			{
                $col = 'A';
				$from = $col.$rowNumber;
				$to = "J".$rowNumber;
                $this->excel->getActiveSheet()->mergeCells("$from:$to");
				$this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
				$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
				
                $rowNumber++;
            }
		}
		$rowNumber++;
		
        if ($data != null) 
		{
            $col = 'A';            
            $styleArray = array(
                'font'  => array(
                    'bold'  => true,
                    'color' => array('rgb' => '000'),
                    //'size'  => 15,
                    //'name'  => 'Verdana'
                ),                
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'EEEEEE')
                ),                
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),                
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel_RichText();
                $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
                $this->excel->getActiveSheet()->getCell($col . $rowNumber)->setValue($objRichText);
                $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                $this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                $col++;
            }
			
            $rowNumber++;
            
                    
            $styleArray = array(          
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            
            foreach ($data as $row) 
            {
                $col = 'A';
                foreach ($row as $cell) {
                    $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                    $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                    $this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                    $col++;
                }
                $rowNumber++;
            }
        }
		
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function __call($name, $arguments) {
        if (method_exists($this->excel, $name)) {
            return call_user_func_array(array($this->excel, $name), $arguments);
        }
        return null;
    }
	
	public function stream_laporan_harian($filename, $data = null, $header = null) {
		$rowNumber  = 1;
		if($header != null)
		{
            $col = 'A'; 
		
			$imp = implode(",", $header);
			$exp = explode(",", $imp);
					
			foreach($exp as $cell)
			{
                $col = 'A';      
				$styleArray = array(			
					'font'  => array(
						'color' => array('rgb' => '000000'),
						'bold'  => true,
						'size'  => 16,
					),                     
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				);
				$from = $col.$rowNumber;
				$to = "P".$rowNumber;
                $this->excel->getActiveSheet()->mergeCells("$from:$to");
				$this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
				$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
				
                $rowNumber++;
            }
		}
		$rowNumber++;		
		
        if ($data != null) {
            $col = 'A';            
            $styleArray = array(			
                'font'  => array(
                    'color' => array('rgb' => '000000'),
                    'bold'  => true
                ),                
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'EEEEEE')
                ),                
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),              
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel_RichText();
                $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
                $this->excel->getActiveSheet()->getCell($col . $rowNumber)->setValue($objRichText);
                $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                $col++;
            }
			$rowNumber++;	
                    
            $styleArray = array(   		
                'font'  => array(
                    'color' => array('rgb' => '000000')
                ),             
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            
            $styleArray_merah = array(   		
                'font'  => array(
                    'color' => array('rgb' => 'FF0000')
                ),             
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
			
            $styleArray_hijau = array(   		
                'font'  => array(
                    'color' => array('rgb' => '000000')
                ),           
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
			
            foreach ($data as $row) 
            {
                $col = 'A';
                foreach ($row as $cell) {					
				
					if($col == 'A' || $col == 'B' || $col == 'C')
					{	
						$this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
						$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
						$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);				
					}
					else
					{
						if($cell < 0)
						{
							$cell = $cell * -1;
							$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray_merah);
						}
						else
						{
							$this->excel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray_hijau);
						}
												
						$val = ($cell == 0) ? "" : $cell;
						$this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $val);
						$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
					}
                    $col++;
                }
                $rowNumber++;
            }
        }
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }
}