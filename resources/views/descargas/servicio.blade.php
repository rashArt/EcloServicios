<?php
Fpdf::SetMargins(20,20,20);
Fpdf::SetTitle('Eclosoft | Servicios');
Fpdf::AddPage();
Fpdf::SetFont('Arial','',12);

Fpdf::Cell(0,3,utf8_decode('Informe de servicio N° 00'.$servicio->id.' solicitado al '.date('d-m-Y h:i:s a')));
//Salto de línea
Fpdf::Ln(10);
// Datos del servicio

Fpdf::Cell(35,5,'Fecha de registro: '.$servicio->created_at->format('d-m-Y'));
Fpdf::Ln(5);
Fpdf::Cell(35,5,utf8_decode('Ultima Actualización: ').$servicio->updated_at->diffForHumans());
Fpdf::Ln(5);
if ($servicio->status == 1){
  Fpdf::Cell(35,5,'Estado actual del servicio: Solicitado');
}
else if ($servicio->status == 2){
  Fpdf::Cell(35,5,'Estado actual del servicio: Procesando');
}
else{
  Fpdf::Cell(35,5,'Estado actual del servicio: Finalizado');
}
Fpdf::Ln(5);
Fpdf::Cell(35,5,'Servicio empleado: '.$servicio->tipo->nombre);
Fpdf::Ln(5);
Fpdf::Cell(35,5,utf8_decode('Razón o motivo: ').utf8_decode($servicio->razon));


Fpdf::Ln(15);

// Datos de cliente
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(20,5,'Datos del Cliente');
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Codigo',1);
Fpdf::Cell(50,5,'Nombres',1);
Fpdf::Cell(30,5,'Telefono',1);
Fpdf::Cell(45,5,'Correo',1);
Fpdf::Ln(5);
Fpdf::SetFont('Arial','',10);
Fpdf::Cell(25,5,'Tecnico-0'.$cliente->id,1);
Fpdf::Cell(50,5,utf8_decode($cliente->nombre.' '.$cliente->apellido),1);
Fpdf::Cell(30,5,$cliente->telefono,1);
Fpdf::Cell(45,5,$cliente->email,1);
Fpdf::Ln(15);

// Datos de tecnico
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(20,5,'Datos del Tecnico');
Fpdf::Ln(5);
Fpdf::Cell(25,5,'Codigo',1);
Fpdf::Cell(50,5,'Nombres',1);
Fpdf::Cell(30,5,'Telefono',1);
Fpdf::Cell(45,5,'Correo',1);
Fpdf::Ln(5);
Fpdf::SetFont('Arial','',10);
Fpdf::Cell(25,5,'Tecnico-0'.$tecnico->id,1);
Fpdf::Cell(50,5,utf8_decode($tecnico->nombre.' '.$tecnico->apellido),1);
Fpdf::Cell(30,5,$tecnico->telefono,1);
Fpdf::Cell(45,5,$tecnico->email,1);
Fpdf::Ln(15);

// Datos de componentes
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(20,5,'Detalles de los componentes');
Fpdf::Ln(5);
Fpdf::Cell(40,5,'Nombre',1);
Fpdf::Cell(40,5,utf8_decode('Serial o Código'),1);
Fpdf::Cell(70,5,utf8_decode('Descripción'),1);
Fpdf::Ln(5);
Fpdf::SetFont('Arial','',10);
foreach ($componentes as $componente)
{
  Fpdf::Cell(40,5,utf8_decode($componente->nombre),1);
  Fpdf::Cell(40,5,$componente->serial,1);
  Fpdf::Cell(70,5,$componente->descripcion,1);
  Fpdf::Ln(15);
}


Fpdf::AddPage();
Fpdf::Cell(20,5,utf8_decode('Las imagenes a continuación muestran cada uno de los procesos realizados a nuetros servicios'));
Fpdf::Ln(10);
Fpdf::SetFont('Arial','B',10);
Fpdf::Cell(50,5,'Solicitado');
Fpdf::Cell(50,5,'Procesando');
Fpdf::Cell(50,5,'Finalizado');

$img1 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img1.jpg';
$img2 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img2.jpg';
$img3 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img3.jpg';
$noExiste = 'imagenes/no_disponible.jpg';

// mostrar imagen 1
if (file_exists($img1)){
  Fpdf::Image($img1,20,80,40);
}
else {
  Fpdf::Image($noExiste,20,80,40);
}
// mostrar imagen 2
if (file_exists($img2)){
  Fpdf::Image($img2,65,80,40);
}
else {
  Fpdf::Image($noExiste,65,80,40);
}
// mostrar imagen 3
if (file_exists($img3)){
  Fpdf::Image($img3,115,80,40);
}
else {
  Fpdf::Image($noExiste,115,80,40);
}

Fpdf::Output('ES0'.$servicio->id.date('--d_m_Y-h:i:sa').'.pdf','I');
exit();
?>