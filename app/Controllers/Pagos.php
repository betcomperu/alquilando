<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\PagoModel;
use App\Models\InmuebleModel;
use App\Models\UsuarioModel;
use Config\Services\session;

use App\ThirdParty\fpdf\FPDF;
use Dompdf\Dompdf;




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

        $inmuebles = $this->inmuebleModel->findAll();
        $usuarios = $this->usuarioModel->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Lista de Pago de Inquilinos",
            'inmuebles' => $inmuebles,
            'usuarios' => $usuarios,
            'pago' => $pagos,
            'sesion_usuario' => $this->session->get('usuario')
        ];

        return view('/Admin/pago/index', $data);
    }
    public function hacerpago()
    {
        //mostrar la vista para hacer pago
        $inmuebles = $this->inmuebleModel->findAll();
        $usuarios = $this->usuarioModel->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Hacer Pago de Inquilinos",
            'inmuebles' => $inmuebles,
            'usuarios' => $usuarios,
            'pago' => $pagos,

            'sesion_usuario' => $this->session->get('usuario')
        ];
        return view('/Admin/pago/hacerpago', $data);
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

    public function guardarpago()
    {

        // Validación de campos
        $rules = [

            'metodo_pago' => 'required',
            'numero_operacion' => 'required',
            'monto' => 'required|numeric',
            'entidad_bancaria' => 'required',
            'fecha_pago' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }



        // Obtener datos del formulario
        $data = [
            'id_usuario' => $this->request->getPost('id_usuario'),
            'detalle' => $this->request->getPost('detalle'),
            'metodo_pago' => $this->request->getPost('metodo_pago'),
            'numero_operacion' => $this->request->getPost('numero_operacion'),
            'entidad_bancaria' => $this->request->getPost('entidad_bancaria'),
            'id_inmueble' => $this->request->getPost('id_inmueble'),
            'monto' => $this->request->getPost('monto'),
            'fecha_pago' => $this->request->getPost('fecha_pago')
        ];
        //dd($data);
        // Guardar el nuevo alquiler
        $this->pago->insert($data);

        return redirect()->to(base_url('/usuarios/pagos'))->with('success', '¡El alquiler se ha guardado exitosamente!');
    }
    public function muestraReciboPDF($idpagos)
    {
        $data = [
            "titulo" => "Recibo de Pago",
            'idpagos' => $idpagos
        ];
        // Carga la vista HTML del recibo de pago
        return view('Admin/Pago/verReciboPDF', $data);
    }

    public function generarReciboPDF($idpagos)
{
    // Obtener los datos del pago (aquí debes implementar tu lógica para obtener los datos del pago según el ID)
    $pago = $this->pago->obtenerPagoPorId($idpagos);
    $pago = $this->pago->obtenerNombrePorId($idpagos);

    // Crear un nuevo objeto FPDF
    $pdf = new \FPDF('L', 'mm', 'A5');
    // Generar un número aleatorio de 5 dígitos
    $codigo_recibo = 'Nro. Recibo: ' . rand(10000, 99999);
    // Añadir una página
    $pdf->AddPage();

    // Establecer la fuente y el tamaño del texto
    $pdf->SetFont('Arial', 'B', 14);

    // Agregar el título del recibo
    $pdf->Cell(0, 10, 'Recibo de Pago Alquiler', 0, 1, 'C');
    // Agregar el título del recibo
    $pdf->Cell(0, 10, $codigo_recibo, 0, 1, 'C');

    // Agregar un marco alrededor del contenido
    $pdf->Rect(5, 30, 190, 60);

    // Agregar información del pago al recibo
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10, 40, 'Inquilino: ' . $pago['nombre']);
    $pdf->Text(10, 50, 'Monto: S/' . $pago['monto']);
    $pdf->Text(10, 60, 'Fecha de abono: ' . $pago['fecha_pago']);
    $pdf->Text(100, 40, 'Fecha de abono: ' . $pago['fecha_pago']);
    
    $pdf->image(base_url() . '/images/logo-house.png', 5, 3, 15, 10, 'PNG');

    // Vamos a configurar la salida antes
    $this->response->setHeader('Content-Type', 'application/pdf');

    // Generar el PDF y mostrarlo en el navegador
    $pdf->Output('recibo_pago_' . $idpagos . '.pdf', 'I');
}
}
