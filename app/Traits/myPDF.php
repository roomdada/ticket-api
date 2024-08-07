<?php
namespace App\Traits;

use FPDF;

class myPDF extends FPDF {
    private $event;

    function __construct($evenements){
        parent::__construct();
        $this->event = $evenements;
    }

    // Page header
    function Header() {
        $this->SetFont('Times', 'B', 14);
        $this->Cell(0, 10, 'Votre ticket: ' . $this->event);
        $this->SetTextColor(0, 0, 255);
        $this->Ln(10);
        $this->Cell(0, 10, 'INFORMATION DU TICKET', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Affichage des attributs en liste
    function headerAttributes() {
        $this->SetFont('Times', '', 12);
        $this->Cell(0, 10, 'Liste des Commandes:', 0, 1, 'L');
        $this->Ln(10);
    }
}