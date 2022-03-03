<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to Myanmar'];
        //$pdf = PDF::loadView('myPDF', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('myPDF', $data);
        return $pdf->download('hello.pdf');
    }
}
