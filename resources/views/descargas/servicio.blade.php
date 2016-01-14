<?php
Fpdf::SetMargins(20,20,20);
Fpdf::AddPage();
Fpdf::SetFont('Arial','',12);


// Datos del servicio

Fpdf::Cell(35,5,'Fecha de registro: '.$servicio->created_at);
Fpdf::Ln(5);
Fpdf::Cell(35,5,'Ultima Actualizacion: '.$servicio->updated_at->diffForHumans());
Fpdf::Ln(5);
Fpdf::Cell(35,5,'Razon o motivo: '.utf8_decode($servicio->razon));
Fpdf::Ln(5);
Fpdf::Cell(35,5,'Servicio aplicado: '.$servicio->tipo->nombre);
Fpdf::Ln(5);
if ($servicio->status == 1){
  Fpdf::Cell(35,5,'Estado Actual del Servicio: Solicitado');
}
else if ($servicio->status == 2){
  Fpdf::Cell(35,5,'Estado Actual del Servicio: Procesando');
}
else{
  Fpdf::Cell(35,5,'Estado Actual del Servicio: Finalizado');
}


Fpdf::Ln(15);
// Datos de tecnico
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(20,5,'Datos del Tecnico');
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Codigo',1);
Fpdf::Cell(50,5,'Nombres',1);
Fpdf::Cell(30,5,'Telefono',1);
Fpdf::Cell(40,5,'Correo',1);
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Tecnico-0'.$tecnico->id,1);
Fpdf::Cell(50,5,utf8_decode($tecnico->nombre.' '.$tecnico->apellido),1);
Fpdf::Cell(30,5,$tecnico->telefono,1);
Fpdf::Cell(40,5,$tecnico->email,1);
Fpdf::Ln(15);

// Datos de cliente

Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(20,5,'Datos del Cliente');
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Codigo',1);
Fpdf::Cell(50,5,'Nombres',1);
Fpdf::Cell(30,5,'Telefono',1);
Fpdf::Cell(40,5,'Correo',1);
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Tecnico-0'.$cliente->id,1);
Fpdf::Cell(50,5,utf8_decode($cliente->nombre.' '.$cliente->apellido),1);
Fpdf::Cell(30,5,$cliente->telefono,1);
Fpdf::Cell(40,5,$cliente->email,1);
Fpdf::Ln(15);

Fpdf::Cell(20,5,utf8_decode('Las imagenes a continuación muestran cada uno de los procesos realizados a nuetros servicios'));
Fpdf::Ln(10);
Fpdf::Cell(50,5,'Solicitado');
Fpdf::Cell(50,5,'Procesando');
Fpdf::Cell(50,5,'Finalizado');

$img1 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img1.jpg';
$img2 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img2.jpg';
$img3 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img3.jpg';
$noExiste = 'imagenes/no_disponible.jpg';

// mostrar imagen 1
if (file_exists($img1)){
  Fpdf::Image($img1,20,160,40);
}
else {
  Fpdf::Image($noExiste,20,160,40);
}
// mostrar imagen 2
if (file_exists($img2)){
  Fpdf::Image($img2,65,160,40);
}
else {
  Fpdf::Image($noExiste,65,160,40);
}
// mostrar imagen 3
if (file_exists($img3)){
  Fpdf::Image($img3,115,160,40);
}
else {
  Fpdf::Image($noExiste,115,160,40);
}

Fpdf::Output();
exit();
?>