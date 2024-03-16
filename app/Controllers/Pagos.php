<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PagoModel;
use App\Models\InmuebleModel;
use App\Models\UsuarioModel;
use Config\Services\session;

use TCPDF\TCPDF;



class Pagos extends BaseController
{
    protected $pago;
    protected $inmuebleModel;
    protected $usuarioModel;
    protected $rolModel;
    protected $session;
    protected $time;
    function __construct()
    {
        /* Cargando biblioteca model y de sesión de usuario */
        $this->usuarioModel = new \App\Models\UsuarioModel();
        $this->inmuebleModel = new \App\Models\inmuebleModel();
        $this->rolModel = new \App\Models\RolModel();
        $this->session = \Config\Services::session();
        $this->pago = new PagoModel();
        helper(['url', 'form']);
        helper(['Fecha_helper']);
         // Cargar la librería Time
        $this->time = new \CodeIgniter\I18n\Time();
    }

 
    public function index()
    {
        
        $inmuebles= $this->inmuebleModel->findAll();
        $usuarios = $this->usuarioModel->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Lista de Pago de Inquilinos",
            'inmuebles' => $inmuebles,
            'usuarios' =>$usuarios,
            'pago'=>$pagos,
            'sesion_usuario' => $this->session->get('usuario')
        ];

        return view('/Admin/pago/index', $data);
    }
    public function hacerpago()
    {
        //mostrar la vista para hacer pago
        $inmuebles= $this->inmuebleModel->findAll();
        $usuarios = $this->usuarioModel->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Hacer Pago de Inquilinos",
            'inmuebles' => $inmuebles,
            'usuarios' =>$usuarios,
            'pago'=>$pagos,
      
            'sesion_usuario' => $this->session->get('usuario')
        ];
        return view ('/Admin/pago/hacerpago', $data);


}

public function pagaralquiler($id)
{
     
     // Suponiendo que `$this->usuarioModel->find($id)` devuelve los datos del usuario correspondiente al ID
     $usuario = $this->usuarioModel->find($id);
    $usuarios = $this->usuarioModel->findAll();
    $pagos = $this->pago->findAll();
    // Si `$usuario` es nulo, puedes manejarlo según sea necesario, como mostrar un mensaje de error
    if ($usuario === null) {
        // Manejar el caso de usuario no encontrado
        return redirect()->to('/ruta_de_redireccion');
    }

    $data = [
        'nombre' => $usuario['nombre'], // Suponiendo que el nombre del usuario se encuentra en la propiedad 'nombre'
        'titulo' => "Hacer Pago del Inquilino",
        'id' => $id,
        'titulo' => "Hacer Pago del Inquilino",
    ];

    return view('/Admin/pago/pagaralquiler', $data);
   }

   public function guardarpago(){

     // Validación de campos
     $rules = [
        
        'metodo_pago' => 'required',
        'numero_operacion' => 'required',
        'monto' => 'required|numeric',
        'comprobante'=>'required',
        'fecha_pago'=>'required|valid_date'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

   

    // Obtener datos del formulario
    $data = [
        'id_usuario' => $this->request->getPost('id_usuario'),
        'metodo_pago' => $this->request->getPost('metodo_pago'),
        'numero_operacion' => $this->request->getPost('numero_operacion'),
        'comprobante' => $this->request->getPost('comprobante'),
        'id_inmueble' => $this->request->getPost('id_inmueble'),
        'monto' => $this->request->getPost('monto'),
        'fecha_pago' => $this->request->getPost('fecha_pago')
    ];
//dd($data);
    // Guardar el nuevo alquiler
    $this->pago->insert($data);

    return redirect()->to(base_url('/usuarios/pagos'))->with('success', '¡El alquiler se ha guardado exitosamente!');
   }

   // En tu controlador
   public function generarReciboPDF($idpagos)
   {
       // Obtener la información del pago según el $idPago
       $pago = $this->pago->obtenerPagoPorId($idpagos);
   
       // Incluir la librería TCPDF
       require_once ROOTPATH . 'vendor/tecnickcom/tcpdf/tcpdf.php';
   
       // Crear una nueva instancia de TCPDF
       $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
       // Configurar el encabezado y el pie de página
       $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
       $pdf->setFooterData(array(0,64,0), array(0,64,128));
   
       // Establecer el título del documento y el autor
       $pdf->SetTitle('Recibo de Pago');
       $pdf->SetAuthor('Tu Nombre');
   
       // Agregar una página
       $pdf->AddPage();
   
       // Escribir el contenido del recibo
       $pdf->SetFont('helvetica', '', 12);
       $pdf->Write(0, 'Recibo de Pago', '', 0, 'C');
   
       // Ahora, imprime la información del pago en el PDF
       $pdf->Ln(10);
       $pdf->Write(0, 'ID de Pago: ' . $pago['idpagos']);
       // Aquí puedes continuar agregando la información del pago al PDF
   
       // Finalmente, generamos el PDF y lo enviamos al navegador
       $pdf->Output('recibo_pago_' . $idpagos . '.pdf', 'I');
   }

}
