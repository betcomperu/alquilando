<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\PagoModel;
use App\Models\InmuebleModel;
use App\Models\UsuarioModel;
use Config\Services\session;

use App\ThirdParty\fpdf\FPDF;






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
        $pago = $this->pago->findAll();
        $pagoModel = new PagoModel(); // Instancia del modelo de pago


      
        // Obtener el ID del usuario actualmente autenticado
        $userId = $this->session->get('idusuario');
      
        // Verificar el rol del usuario actual
        $userRol = $this->session->get('rol');
        
        // Si el usuario es administrador (rol 1 o 2), obtener todos los pagos
        if ($userRol == 1 ) {
          
            $data = [
                'titulo' => "Lista de Pago de Inquilinos",
                'inmuebles' => $inmuebles,
                'usuarios' => $usuarios,
              'sesion_usuario' => $this->session->get('usuario'),
                'pago'=> $this->pago->findAll()
            ];
          
        } else {
            $pago = $pagoModel->where('id_usuario', $userId)->findAll(); // Consulta para obtener los pagos del usuario
            // Si el usuario es inquilino (rol 3), obtener solo los pagos del usuario actual
            $data = [
                'titulo' => "Pago del Inquilinos",
                'inmuebles' => $inmuebles,
                'usuarios' => $usuarios,
             //   'sesion_usuario' => $this->session->get('usuario'),
                'pago'=> $pago
            ];
            
        }

        // Pasar los datos a la vista
        return view('/Admin/pago/index', $data);


 

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
        $inmuebles = $this->inmuebleModel->where('condicion', '1')->findAll();
        $usuarios = $this->usuarioModel->where('condicion', '1')->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Generar Recibo de Pago alquiler",
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
            'titulo' => "Generar Recibo de Pago",
            'id' => $id,

        ];

        return view('/Admin/pago/pagaralquiler', $data);
    }

    public function guardarpago()
    {
        // Validación de campos
        $rules = [

            // 'metodo_pago' => 'required',
            //'numero_operacion' => 'required',
            'monto' => 'required|numeric',
            // 'entidad_bancaria' => 'required',
            // 'fecha_pago' => 'required|valid_date'
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

    public function editarReciboPDF($idpagos)
    {
        // $inquilino = $this->usuarioModel->find($idpagos);
        $elinmueble = $this->pago->obtenerInmueblePorId($idpagos);
        $inquilinos = $this->usuarioModel->findAll();
        $inmuebles = $this->inmuebleModel->where('condicion', '1')->findAll();
        $inquilinoTraidoPorIdPago = $this->pago->obtenerNombrePorId($idpagos);

        $pago = $this->pago->find($idpagos);
        $pagos = $this->pago->where('idpagos', $idpagos)->findAll(); // Jala Los pagoa del usuario
        $pagoid = $this->pago->obtenerPagoPorId($idpagos);

        $metododepago = null;
        if ($pago && isset($pago['metodo_pago'])) {
            $metododepago = $pago['metodo_pago'];
        }

        $data = [
            //  'inquilino' => $inquilino,
            'inquilinos' => $inquilinos,
            'pagos' => $pagos,
            'pago' => $pago,
            'pagoid' => $pagoid,
            'inmuebles' => $inmuebles,
            'titulo' => "Editar Recibo de Inquilino",
            'metododepago' => $metododepago,
            'InquilinoTraido' => $inquilinoTraidoPorIdPago,
            'elinmueble' => $elinmueble
        ];

        return view('/Admin/pago/editarRecibo', $data);
    }

    public function updatepago($idpagos = null)
    {
        // Validación de campos
        /*   $rules = [
        'metodo_pago' => 'required',
        'numero_operacion' => 'required',
        'monto' => 'required|numeric',
        'entidad_bancaria' => 'required',
        'fecha_pago' => 'required|valid_date'
    ];

    // Aplicar las reglas de validación
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    } */

        // Obtener ID del pago
        $idpagos = $this->request->getPost('idpagos');

        // Verificar si se proporcionó un ID de pago válido
        if (!$idpagos) {
            return redirect()->back()->withInput()->with('error', 'ID de pago inválido');
        }
        $idinmueble = $this->request->getPost('id_inmueble');
        //dd($idinmueble);
        // Obtener datos del formulario
        $data = [
            'detalle' => $this->request->getPost('detalle'),
            'metodo_pago' => $this->request->getPost('metodo_pago'),
            'numero_operacion' => $this->request->getPost('numero_operacion'),
            'entidad_bancaria' => $this->request->getPost('entidad_bancaria'),
            'monto' => $this->request->getPost('monto'),
            'id_inmueble' => $idinmueble,
            'fecha_pago' => $this->request->getPost('fecha_pago'),
            'activo' => $this->request->getPost('activo')
        ];

        // Actualizar el pago utilizando el modelo
        $updated = $this->pago->updatePago($idpagos, $data);

        // Verificar si la actualización fue exitosa
        if ($updated) {
            session()->setFlashdata('editado', 'El Pago ha sido Actualizado');
            return redirect()->to(base_url('/usuarios/pagos'));
        } else {
            return redirect()->back()->withInput()->with('error', '¡Error al actualizar el pago!');
        }
    }

    public function delete($idpagos)
    {
        $p = $this->pago->delete($idpagos);

        return redirect()->to(base_url('/usuarios/pagos'))->with('success', '¡El pago se ha eliminado exitosamente!');
    }

    public function validarpago($idpagos)
    {
        // Obtener el pago por su ID
        $pago = $this->pago->find($idpagos);

        // Verificar si el pago existe
        if (!$pago) {
            // Pago no encontrado, puedes redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'El pago no existe.');
        }

        // Determinar el nuevo valor para el estado activo
        $nuevoEstadoActivo = ($pago['activo'] == 0) ? 1 : 0;

        // Actualizar el estado activo del pago
        $data = ['activo' => $nuevoEstadoActivo];
        $this->pago->update($idpagos, $data);

        // Redirigir de vuelta o mostrar un mensaje de éxito
        return redirect()->to(base_url() . '/usuarios/pagos')->with('success', 'El estado del pago ha sido actualizado correctamente.');
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
        $pago = $this->pago->find($idpagos);
        $nombre_inquilino = $this->pago->obtenerNombrePorId($idpagos);
        $inquilino = $nombre_inquilino['nombre'];
        $inmueble = $this->pago->obtenerInmueblePorId($idpagos);
        $nombre_inmueble = $inmueble['direccion'];

        /* Obtener la fecha del pago */
        $fecha_pago = $pago['fecha_pago']; // '2024-02-25'

        // Crear un objeto DateTime a partir del formato 'Y-m-d'
        $fecha = \DateTime::createFromFormat('Y-m-d', $fecha_pago);

        // Formatear la fecha al formato 'd-m-Y'
        $fecha_formateada = $fecha->format('d-m-Y'); // '25-02-2024'
        /* ***** FIN Obtener la fecha del pago ******/

        // Crear un nuevo objeto FPDF
        $pdf = new \FPDF($orientation = 'P', $unit = 'mm', $size = 'A4');

        // Añadir una página
        $pdf->AddPage();

        // Establecer la fuente y el tamaño del texto para el título
        $pdf->SetFont('Arial', 'B', 16);

        // Título del recibo
        $pdf->SetFillColor(255, 255, 255); // Color de fondo blanco
        $pdf->Cell(0, 10, 'Pago de Alquiler', 0, 1, 'C', true);

        // Establecer la fuente y el tamaño del texto para la información del recibo
        $pdf->SetFont('Arial', '', 12);

        // Convertir el texto al formato UTF-8 utilizando iconv
        $texto_metodo = iconv('UTF-8', 'windows-1252//TRANSLIT', 'Método de Pago:');

        ### Generacion de numero de recibo ###
        // Generar un número de recibo único basado en la fecha y el ID del inquilino
        $nro_operacion = $pago['numero_operacion']; // Obtener la fecha actual en formato 'AñoMesDía'
        $id_inquilino = $pago['id_usuario']; // Suponiendo que 'id_inquilino' es una clave en tu array de pago
        $numero_recibo = $id_inquilino . "-" . $nro_operacion;
        #################
        // Número de recibo
        $pdf->Cell(0, 10, 'Nro. Recibo: ' . $numero_recibo, 0, 1, 'C');

        // Información del inquilino y pago
        $pdf->SetFillColor(230, 230, 230); // Color de fondo gris claro
        $nombre_inquilino = $inquilino; // texto del banco en la base datos
        $nombre = iconv('UTF-8', 'windows-1252//TRANSLIT', $nombre_inquilino);
        $pdf->Cell(55, 10, 'Inquilino:', 1, 0, 'L', true);
        $pdf->Cell(125, 10, $nombre, 1, 1, 'L', true);

        $nombre_inmueble = $nombre_inmueble; // texto del banco en la base datos
        $direccion = iconv('UTF-8', 'windows-1252//TRANSLIT', $nombre_inmueble);
        $pdf->Cell(55, 10, 'Inmueble alquilado:', 1, 0, 'L', true);
        $pdf->Cell(125, 10, $direccion, 1, 1, 'L', true);

        $pdf->Cell(55, 10, 'Monto:', 1, 0, 'L', true);
        $pdf->Cell(125, 10, 'S/' . $pago['monto'], 1, 1, 'L', true);

        $pdf->Cell(55, 10, $texto_metodo, 1, 0, 'L', true);
        $pdf->Cell(125, 10, $pago['metodo_pago'], 1, 1, 'L', true);

        $banco = $pago['entidad_bancaria']; // texto del banco en la base datos
        $texto_banco = iconv('UTF-8', 'windows-1252//TRANSLIT', $banco);

        $detalles = $pago['detalle']; // texto del detalle en la base datos
        $texto_detalles = iconv('UTF-8', 'windows-1252//TRANSLIT', $detalles);

        $pdf->Cell(55, 10, 'Entidad Bancaria:', 1, 0, 'L', true);
        $pdf->Cell(125, 10, $texto_banco, 1, 1, 'L', true);

        $nombre_inmueble = $nombre_inmueble; // texto del banco en la base datos
        $no_opreacion = iconv('UTF-8', 'windows-1252//TRANSLIT', 'Nro. Operación:');
        $pdf->Cell(55, 10, $no_opreacion, 1, 0, 'L', true);
        $pdf->Cell(125, 10, $pago['numero_operacion'], 1, 1, 'L', true);

        $pdf->Cell(55, 10, 'Fecha de Abono:', 1, 0, 'L', true);
        $pdf->Cell(125, 10, $fecha_formateada, 1, 1, 'L', true);


        // Celda para "Detalles:"
        $pdf->Cell(55, 10, 'Detalles:', 1, 0, 'L', true);
        // Celda para el contenido del detalle
        $pdf->cell(125, 10, $texto_detalles, 1, 1, 'L', true);

        $pdf->SetFont('Arial', '', 7);

        // Celda para el total
        $pdf->Cell(0, 10, 'Este documento, no tiene valor tributario. Solo de uso interno.', 0, 1, 'L');

        // Logo de la empresa
        $pdf->Image(base_url() . '/images/logo-house.png', 10, 10, 40, 15);
        // Sello de pago
        // Obtener el estado del pago
        $estado_pago = $pago['activo'];

        // Determinar la imagen según el estado del pago
        $imagen_pago = ($estado_pago == 0) ? 'pendiente.png' : 'pagoaprobado.png';

        // Obtener la ruta completa de la imagen
        $ruta_imagen = base_url() . '/images/' . $imagen_pago;

        // Insertar la imagen en el PDF
        $pdf->Image($ruta_imagen, 135, 10, 60, 30); // Ajusta las coordenadas y las dimensiones según tu diseño



        // Vamos a configurar la salida antes
        $this->response->setHeader('Content-Type', 'application/pdf');

        // Generar el PDF y mostrarlo en el navegador
        $pdf->Output('recibo_pago_' . $idpagos . '.pdf', 'I');
    }
}
