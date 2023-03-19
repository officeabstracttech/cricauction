<?php
include("config.php");
require("fpdf185/fpdf.php");



class PDF_MySQL_Table extends FPDF
{
protected $ProcessingTable=false;
protected $aCols=array();
protected $TableX;
protected $HeaderColor;
protected $RowColors;
protected $ColorIndex;

function Header()
{
    // Print the table header if necessary
    if($this->ProcessingTable)
        $this->TableHeader();
}

function TableHeader()
{
    $this->SetFont('Arial','B',12);
    $this->SetX($this->TableX);
    $fill=!empty($this->HeaderColor);
    if($fill)
        $this->SetFillColor($this->HeaderColor[0],$this->HeaderColor[1],$this->HeaderColor[2]);
    foreach($this->aCols as $col)
        //$this->Cell($col['w'],6,$col['c'],1,0,'C',$fill);
        $this->Cell($col['w'],6,$col['c'],1,0,'C',$fill);
        
    $this->Ln();
}

function Row($data)
{
    $this->SetX($this->TableX);
    $ci=$this->ColorIndex;
    $fill=!empty($this->RowColors[$ci]);
    if($fill)
        $this->SetFillColor($this->RowColors[$ci][0],$this->RowColors[$ci][1],$this->RowColors[$ci][2]);
    foreach($this->aCols as $col)
        $this->Cell($col['w'],5,$data[$col['f']],1,0,$col['a'],$fill);
    $this->Ln();
    $this->ColorIndex=1-$ci;
}

function CalcWidths($width, $align)
{
    // Compute the widths of the columns
    $TableWidth=0;
    foreach($this->aCols as $i=>$col)
    {
        $w=$col['w'];
        if($w==-1)
            $w=$width/count($this->aCols);
        elseif(substr($w,-1)=='%')
            $w=$w/100*$width;
        $this->aCols[$i]['w']=$w;
        $TableWidth+=$w;
    }
    // Compute the abscissa of the table
    if($align=='C')
        $this->TableX=max(($this->w-$TableWidth)/2,0);
    elseif($align=='R')
        $this->TableX=max($this->w-$this->rMargin-$TableWidth,0);
    else
        $this->TableX=$this->lMargin;
}

function AddCol($field=-1, $width=-1, $caption='', $align='L')
{
    // Add a column to the table
    if($field==-1)
        $field=count($this->aCols);
    $this->aCols[]=array('f'=>$field,'c'=>$caption,'w'=>$width,'a'=>$align);
}


function Table($link, $query, $prop=array())
{
    // Execute query
    $res=mysqli_query($link,$query) or die('Error: '.mysqli_error($link)."<br>Query: $query");
    // Add all columns if none was specified
    if(count($this->aCols)==0)
    {
        $nb=mysqli_num_fields($res);
        for($i=0;$i<$nb;$i++)
            $this->AddCol();
    }
    // Retrieve column names when not specified
    foreach($this->aCols as $i=>$col)
    {
        if($col['c']=='')
        {
            if(is_string($col['f']))
                $this->aCols[$i]['c']=ucfirst($col['f']);
            else
                $this->aCols[$i]['c']=ucfirst(mysqli_fetch_field_direct($res,$col['f'])->name);
        }
    }
    // Handle properties
    if(!isset($prop['width']))
        $prop['width']=0;
    if($prop['width']==0)
        $prop['width']=$this->w-$this->lMargin-$this->rMargin;
    if(!isset($prop['align']))
        $prop['align']='C';
    if(!isset($prop['padding']))
        $prop['padding']=$this->cMargin;
    $cMargin=$this->cMargin;
    $this->cMargin=$prop['padding'];
    if(!isset($prop['HeaderColor']))
        $prop['HeaderColor']=array();
    $this->HeaderColor=$prop['HeaderColor'];
    if(!isset($prop['color1']))
        $prop['color1']=array();
    if(!isset($prop['color2']))
        $prop['color2']=array();
    $this->RowColors=array($prop['color1'],$prop['color2']);
    // Compute column widths
    $this->CalcWidths($prop['width'],$prop['align']);
    // Print header
    $this->TableHeader();
    // Print rows
    $this->SetFont('Arial','',11);
    $this->ColorIndex=0;
    $this->ProcessingTable=true;
    while($row=mysqli_fetch_array($res))
        $this->Row($row);
    $this->ProcessingTable=false;
    $this->cMargin=$cMargin;
    $this->aCols=array();
}
}



class PDF extends PDF_MySQL_Table
{
    
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'CricAuction Report',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}


if(isset($_GET["report"]) && $_GET["report"]==1)// if true then all  player sold data 
{
    $pdf = new PDF();
    $pdf->AddPage();
$pdf->Table($con,'SELECT player_name,player_role,player_master.phone_no,player_dob,sold_status,sold_points,team_name from player_master inner join player_mapping_master on player_master.id=player_mapping_master.player_id inner join team_master on player_mapping_master.team_id=team_master.id and player_mapping_master.tournment_id='.$_SESSION["login_user"].' and player_mapping_master.enrolled_status=1 and sold_status=1;');
$pdf->AddPage();
$pdf->Output();
}
else if(isset($_GET["report"]) && $_GET["report"]==2)// if true then all  player unsold data 
{
    $pdf = new PDF();
    $pdf->AddPage();
$pdf->Table($con,'SELECT player_name,player_role,player_master.phone_no,player_dob,sold_status,sold_points from player_master inner join player_mapping_master on player_master.id=player_mapping_master.player_id  and player_mapping_master.tournment_id='.$_SESSION["login_user"].' and player_mapping_master.enrolled_status=1 and sold_status=2;');
$pdf->AddPage();
$pdf->Output();
}
else if(isset($_GET["report"]) && isset($_GET["team_id"]) && $_GET["report"]==3)// if true then all  player unsold data 
{
    $pdf = new PDF();
    $pdf->AddPage();
$pdf->Table($con,'  SELECT player_name,player_role,phone_no,player_dob,sold_points from player_master inner join player_mapping_master on player_master.id=player_mapping_master.player_id and player_mapping_master.team_id='.$_GET["team_id"].';');
$pdf->AddPage();
$pdf->Output();
}
else
{
    $pdf = new PDF();
    $pdf->AddPage();
// First table: output all columns
$pdf->Table($con,'select player_master.id as Player_ID,player_master.player_name as Player_Name,player_master.player_role as Role,player_master.player_age as Age from player_master left join player_mapping_master on player_mapping_master.player_id=player_master.id where enrolled_status=1;');
$pdf->AddPage();
$pdf->Output();
    


}

?>