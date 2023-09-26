<?php

namespace App\Helpers;

class Fecha_Helper
{
    public function formatearFecha($fecha)
    {
        // Cargar la clase Time
        $time = new \CodeIgniter\I18n\Time($fecha, 'UTC');

        // Formatear la fecha como "d de F Y" (18 de Julio 2023)
        return $time->format('d \d\e F Y');
    }
}
