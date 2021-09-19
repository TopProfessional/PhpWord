<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<?php
    require 'vendor\autoload.php';
    require_once ('Model.php');
    $All = Model::viewAll();
    
    error_reporting(0);

    $phpWord = new \PhpOffice\PhpWord\PhpWord();

$phpWord->getCompatibility()->setOoxmlVersion(14);
$phpWord->getCompatibility()->setOoxmlVersion(15);
$section = $phpWord->addSection();
$section->getStyle()->setBreakType('continuous');
$header = $section->addHeader();
$header->headerTop(10);


$section->addTextBreak(-5);
$center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));
$section->addTextBreak(-.5);

$section->addText('Mistakes',array('bold' => true,'underline'=>'single','name'=>'Times New Roman','size' => 16),$center);
$section->addTextBreak(-.5);

$tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );

$styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black');
$styleCellError = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black'
,'bgColor'=>'9966CC' );

$fontStyle = array( 'size'=>11, 'name'=>'Times New Roman','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
$TfontStyle = array('bold'=>true, 'size'=>14, 'name' => 'Times New Roman', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);


$id = $_POST["1"];
$name = $_POST["2"];
$number = $_POST["3"];
$description = $_POST["4"];
$category = $_POST["5"];
$price = $_POST["6"];
$kol = $_POST["7"];
$status = $_POST["8"];

$noSpace = array('textBottomSpacing' => -1);
$table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
$table2 = $section->addTable('myOwnTableStyle');
$table->addRow(-0.5, array('exactHeight' => -5));

if($id == "on")
{
$table->addCell(2500,$styleCell)->addText('id',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($name == "on")
{    
$table->addCell(6000,$styleCell)->addText('name',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($number == "on")
{
$table->addCell(1500,$styleCell)->addText('number',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($description == "on")
{
$table->addCell(2000,$styleCell)->addText('description',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($category == "on")
{
$table->addCell(2500,$styleCell)->addText('category',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($price == "on")
{
$table->addCell(6000,$styleCell)->addText('price',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($kol == "on")
{
$table->addCell(1500,$styleCell)->addText('kol',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
if($status == "on")
{
$table->addCell(2000,$styleCell)->addText('status',$TfontStyle,array('align' => 'center', 'spaceAfter' => 0));
}
$table->addRow();

$allError=0;
$Errors=0;
$emptyCells=0;

foreach ($All as $AllItem) 
{
    $styleCellName     = $styleCell;
    $styleCellNum      = $styleCell;
    $styleCellDesc     = $styleCell;
    $styleCellCategory = $styleCell;
    $styleCellPrice    = $styleCell;
    $styleCellKol      = $styleCell;
    $styleCellStatus   = $styleCell;

        if($id == "on")
        {
        $table->addCell(2500,$styleCell)->addText($AllItem['id'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }

        if($name == "on")
        {
            if((preg_match('/[0-9.-?<>+!=][a-zA-Z]/',$AllItem['name'])) || 
            (preg_match('/[a-zA-Z][0-9.-?<>+!=]/',$AllItem['name'])))
            {
                $styleCellName = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['name']=='')  
            {
                $styleCellName = $styleCellError;
                $allError++;
                $emptyCells++;
            }     
            $table->addCell(2500,$styleCellName)->addText($AllItem['name'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }                    


        if($number == "on")
        {
            if(preg_match('/[^[:digit:]]/',$AllItem['num']))
            {
                $styleCellNum = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['num']=='')  
            {
                $styleCellNum = $styleCellError;
                $allError++;
                $emptyCells++;
            } 
            $table->addCell(2500,$styleCellNum)->addText($AllItem['num'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }

        if($description == "on")
        {
            if((preg_match('/[0-9.-?<>+!=][a-zA-Z]/',$AllItem['description'])) || 
            (preg_match('/[a-zA-Z][0-9.-?<>+!=]/',$AllItem['description'])))
            {
                $styleCellDesc = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['description']=='')  
            {
                $styleCellDesc = $styleCellError;
                $allError++;
                $emptyCells++;
            } 
            $table->addCell(2500,$styleCellDesc)->addText($AllItem['description'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }    

        if($category == "on")
        {
            if(($AllItem['category'] != 'tourism') &&
            ($AllItem['category'] != 'house') &&
            ($AllItem['category'] != 'other') &&
            ($AllItem['category'] != 'sport'))
            {
                $styleCellCategory = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['category']=='')  
                {
                    $styleCellCategory = $styleCellError;
                    $allError++;
                    $emptyCells++;
                }
                $table->addCell(2500,$styleCellCategory)->addText($AllItem['category'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }        

        if($price == "on")
        {
            if(preg_match('/[^[:digit:]]\./',$AllItem['price']))
            {
                $styleCellPrice = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['price']=='')  
                {
                    $styleCellPrice = $styleCellError;
                    $allError++;
                    $emptyCells++;
                }     
                $table->addCell(2500,$styleCellPrice)->addText($AllItem['price'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }

        if($kol == "on")
        {
            if(preg_match('/[^[:digit:]]/',$AllItem['kol'])) 
            {
                $styleCellKol = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['kol']=='')  
                {
                    $styleCellKol = $styleCellError;
                    $allError++;
                    $emptyCells++;
                }
            $table->addCell(2500,$styleCellKol)->addText($AllItem['kol'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }        

        if($status == "on")
        {
            if(($AllItem['status'] != 'Not available') &&
            ($AllItem['status'] != 'On sale'))
            {
                $styleCellStatus = $styleCellError;
                $allError++;
                $Errors++;
            }
            if($AllItem['status']=='')  
                {
                    $styleCellStatus = $styleCellError;
                    $allError++;
                    $emptyCells++;
                }    
                $table->addCell(2500,$styleCellStatus)->addText($AllItem['status'],$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
        }
    
    $table->addRow();        
    
}

/*
if($allError==0)echo"Any Errors not found.";
else echo "find:".$allError." errors";
*/
if($id == "on")
{
$table->addCell(2500,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($name == "on")
{
$table->addCell(6000,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($number == "on")
{
$table->addCell(1500,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($description == "on")
{
$table->addCell(2000,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($category == "on")
{
$table->addCell(2500,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($price == "on")
{
$table->addCell(6000,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($kol == "on")
{
$table->addCell(1500,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

if($status == "on")
{
$table->addCell(2000,$styleCell)->addText('',$fontStyle,array('align' => 'center', 'spaceAfter' => 0));
}

$section->addTextBreak(-1);
$section->addTextBreak(-.5);

if($Errors==0 && $emptyCells==0 && $allError==0) 
{
    $section->addText('Any errors not found',array('name'=>'Times New Roman','size' => 13));
    $section->addTextBreak(-.5);
}
else
{
$section->addText('Grammatical errors: '.$Errors,array('name'=>'Times New Roman','size' => 13));
$section->addTextBreak(-.5);
$section->addText('Empty cells: '.$emptyCells,array('name'=>'Times New Roman','size' => 13));
$section->addTextBreak(-.5);
$section->addText('Total errors: '.$allError,array('name'=>'Times New Roman','size' => 13));
$section->addTextBreak(-.5);
}
$section->addText('date: '.date("F j, Y, g:i a"),array('name'=>'Times New Roman','size' => 13));
$section->addTextBreak(-.5);
//date("F j, Y, g:i a");

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
$objWriter ->save('checkErrors.docx');

?>
<a href="checkErrors.docx" download><button class="btn"><i class="fa fa-download"></i> Download</button></a>



<br>
<br>
<a href="gg.php" >Main page</a>