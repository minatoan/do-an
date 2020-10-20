<?php
global $db;
 $db = @new mysqli("localhost", "root", "", "quanlyphongmayth");
 
 if ($db->connect_errno){
 	die("Không thể kết nối CSDL <br> ". $db->connect_error);
 };
 $db->query("SET NAMES utf8");

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=excel-export.xls");


class Excel_XML
{

	
	private $header = "<?xml version=\"1.0\" encoding=\"%s\"?\>\n<Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">";

	
	private $footer = "</Workbook>";

	private $lines = array();

	public $sEncoding;

	private $bConvertTypes;

	private $sWorksheetTitle;

	private $filename;

	public function __construct($sEncoding = 'UTF-8', $bConvertTypes = false, $sWorksheetTitle = 'Table1')
	{
		$this->bConvertTypes = $bConvertTypes;
		$this->setEncoding($sEncoding);
		$this->setWorksheetTitle($sWorksheetTitle);
	}

	
	public function setEncoding($sEncoding)
	{
		$this->sEncoding = $sEncoding;
	}

	public function setWorksheetTitle ($title)
	{
		$title = preg_replace ("/[\\\|:|\/|\?|\*|\[|\]]/", "", $title);
		$title = substr ($title, 0, 31);
		$this->sWorksheetTitle = $title;
	}
	private function addRow ($array)
	{
		$cells = "";
		foreach ($array as $k => $v):
		$type = 'String';
		if ($this->bConvertTypes === true && is_numeric($v)):
		$type = 'Number';
		endif;
		$v = htmlentities($v, ENT_COMPAT, $this->sEncoding);
		//echo "<ss:Column>ss:AutoFitWidth='1'</ss:Column>";
		$cells .= "<Cell><Data ss:Type=\"$type\">" . $v . "</Data></Cell>\n";
		endforeach;
		$this->lines[] = "<Row>\n" . $cells . "</Row>\n";
	}

	
	public function addArray ($array)
	{
		foreach ($array as $k => $v)
			$this->addRow ($v);
	}


	
	public function generateXML ($filename = 'excel-export')
	{
		// correct/validate filename
		$filename = preg_replace('/[^aA-zZ0-9\_\-]/', '', $filename);
		 
		// deliver header (as recommended in php manual)
		// header("Content-Type: application/vnd.ms-excel; charset=" . $this->sEncoding);
		// header("Content-Disposition: attachment; filename=\"" . $filename . ".xlsx\"");
		// print out document to the browser
		// need to use stripslashes for the damn ">"
		echo stripslashes (sprintf($this->header, $this->sEncoding));
		echo "\n<Worksheet ss:Name=\"" . $this->sWorksheetTitle . "\">\n<Table>\n";
		for ($i=2;$i<=20;$i++)
        {
        echo "<Column ss:Index=\"$i\" ss:AutoFitWidth=\"1\" ss:Width=\"120\"/>\n";
        }
        foreach ($this->lines as $line)
			echo $line;
		echo "</Table>\n</Worksheet>\n";
		echo $this->footer;
	}
}


?>