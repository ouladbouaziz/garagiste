<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Mecanicien;
use App\Models\Piece;
use PDF;

class PDFController extends Controller
{
    public function generatePdfc()
    {
        $logo = 'storage/logos/logo.png';
        $clients=Client::all();
        $data = 
        [
            'title' => 'Liste des clients',
            'clients'=>$clients,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('admin.pdf.clientpdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }

    public function generatePdfm()
    {
        $logo = 'storage/logos/logo.png';
        $mecaniciens=Mecanicien::all();
        $data = 
        [
            'title' => 'Liste des mecaniciens',
            'mecaniciens'=>$mecaniciens,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('admin.pdf.mecanicienspdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }
    public function generatePdfp()
    {
        $logo = 'storage/logos/logo.png';
        $pieces=Piece::all();
        $data = 
        [
            'title' => 'Liste des pieces',
            'pieces'=>$pieces,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('admin.pdf.piecespdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }
}
