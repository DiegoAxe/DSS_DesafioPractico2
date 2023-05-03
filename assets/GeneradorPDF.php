<?php
/// Powered by Evilnapsis go to http://evilnapsis.com
include "fpdf/fpdf.php";

/*Variables utilizadas
$NumVenta = Id de la venta
$FechaCompra = Fecha de la Venta
$NombCliente = Nombre del Cliente
$CantVenta = Cantidad Vendida
$PrecProduct = Precio del Producto
$NombProduct = Nombre del Producto

*/

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"Tienda Online de Textil Export");
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(5,$textypos,"DE:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Textil Export");
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Universidad Don Bosco");
#$pdf->setY(45);$pdf->setX(10);
#$pdf->Cell(5,$textypos,"Github:");
#$pdf->setY(50);$pdf->setX(10);
#$pdf->Cell(5,$textypos,"Email de la empresa");

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(75);
$pdf->Cell(5,$textypos,"CREADO POR:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Ariel Lemus");
$pdf->setY(40);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Cristian Lopez");
#$pdf->setY(45);$pdf->setX(75);
#$pdf->Cell(5,$textypos,"Telefono del cliente");
#$pdf->setY(50);$pdf->setX(75);
#$pdf->Cell(5,$textypos,"Email del cliente");

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(5,$textypos,"FACTURA #000".$NumVenta); //Aqui va a escribirse el numero de venta
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Fecha: ".$FechaCompra); //Aqui va a escribirse la fecha de venta
$pdf->setY(40);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Vencimiento: 2024-12-31");
$pdf->setY(45);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");
$pdf->setY(50);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("#", "Producto","Cantidad","Precio","Total");
//// Arrar de Productos

//-------------------ID Venta------Nom Producto---Cantidad------Precio---
$products = array("000".$NumVenta, $NombProduct, $CantVenta, $PrecProduct,0);

    // Column widths
    $w = array(20, 95, 20, 25, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    $pdf->Cell($w[0],6,$products[0],1);
    $pdf->Cell($w[1],6,$products[1],1);
    $pdf->Cell($w[2],6,number_format($products[2]),'1',0,'R');
    $pdf->Cell($w[3],6,"$ ".number_format($products[3],2,".",","),'1',0,'R');
    $pdf->Cell($w[4],6,"$ ".number_format($products[3]*$products[2],2,".",","),'1',0,'R');

    $pdf->Ln();
    $total+=$products[3]*$products[2];

/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($products)*10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
	array("Subtotal",$total),
	array("Descuento", 0),
	array("Impuesto", 0),
	array("Total", $total),
);
    // Column widths
    $w2 = array(40, 40);
    // Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }
/////////////////////////////

$yposdinamic += (count($data2)*10);
$pdf->SetFont('Arial','B',10);    

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"CLIENTE: ".$NombCliente);
$pdf->SetFont('Arial','',10);    

$pdf->setY($yposdinamic+10);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"El cliente se compromete a pagar la factura.");
$pdf->setY($yposdinamic+20);
$pdf->setX(10);


$pdf->output();
