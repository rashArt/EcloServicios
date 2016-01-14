<?php
Fpdf::SetMargins(20,20,20);
Fpdf::AddPage();
Fpdf::SetFont('Times','',12);

// Header de la tabla
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(10,5,'#',1);
Fpdf::Cell(30,5,'Cedula',1);
Fpdf::Cell(50,5,'Nombres',1);
Fpdf::Cell(40,5,'Telefono',1);
Fpdf::Cell(40,5,'Cargo',1);
Fpdf::Ln(5);

// contenido
Fpdf::SetFont('Arial','',10);
// consulto los empleados

foreach ($clientes as $row)
{
  Fpdf::Cell(10,5,$row->id,1);
  Fpdf::Cell(30,5,$row->cedula,1);
  Fpdf::Cell(50,5,utf8_decode($row->nombre.' '.$row->apellido),1);
  Fpdf::Cell(40,5,$row->telefono,1);
  Fpdf::Cell(40,5,$row->email,1);
  Fpdf::Ln(5);
}

Fpdf::Output();
exit();
?>