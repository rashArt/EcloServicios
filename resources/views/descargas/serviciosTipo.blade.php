<?php
Fpdf::SetMargins(20,20,20);
Fpdf::AddPage();
Fpdf::SetFont('Times','',12);

// Header de la tabla
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(10,5,'#',1);
Fpdf::Cell(60,5,'Nombre',1);
Fpdf::Ln(5);

// contenido
Fpdf::SetFont('Arial','',10);
// consulto los empleados

foreach ($tipos as $row)
{
  Fpdf::Cell(10,5,$row->id,1);
  Fpdf::Cell(60,5,utf8_decode($row->nombre),1);
  Fpdf::Ln(5);
}

Fpdf::Output();
exit();
?>