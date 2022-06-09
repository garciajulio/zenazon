<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF{

    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';
    

function Header()
{
    $this->SetFont('Arial','B',16);
    $this->Cell(1);
    $this->Cell(0,10,'Comprobante de pago 2022',1,0,'C');
    $this->Ln(20);
}


function ImprovedTable($header, $data)
{
    
    $w = array(50,100,40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();

    foreach($data as $row)
    {
        $this->Cell($w[0],6,number_format($row[0])." unidades",'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,"$/".number_format($row[2]),'LR',0,'R');
        $this->Ln();
    }

    $this->Cell(array_sum($w),0,'','T');
}



function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}



function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}


function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

 function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','B',8);
    $this->Cell(0,10,'Este documento no tiene relevancia legal | Zenazon 2022',0,0,'C');
}

}


$pdf = new PDF();
$html = "<br><p><b>Nombre de la tienda: </b>".$data[1]['tienda']."</p><br><p><b>Id unico de compra: </b>".$data[1]['id']."</p><br><p><b>Precio Total:</b> $/".$data[1]['precio']."</p>";
$header = array('Cantidad', 'Descripcion', 'Importe');
$pdf->SetFont('Times','',12);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->ImprovedTable($header,$data[0]);
$pdf->WriteHTML($html);
$pdf->Output();

?>