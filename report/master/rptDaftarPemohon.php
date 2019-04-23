<?php

include '../../config.php';
require '../../fpdf/fpdf.php';



class PDF extends FPDF
{
// Page header
    function Header()
    {

        //variabel untuk lebar kolom
        $lebar_kolom_no = 10;
        $lebar_kolom_nama = 60;
        $lebar_kolom_nik = 20;
        $lebar_kolom_jk=10;
        $lebar_kolom_tempat_lahir = 50;

        //panjang kolom terakhir
        //adalah 0
        //supaya perpanjang otomatis selebar kertas
        $lebar_kolom_tanggal_lahir = 0;


        // Logo
        $this->Image('../../image/simbol/imigrasi.jpg',10,10,20, 20);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(30);
        // Title
        $this->Cell(30,10,'DAFTAR PEMOHON',0,0,'L');

        $this->Ln(5);
        $this->Cell(30);
        // Title
        $this->Cell(30,10,'Kantor Imigrasi Pemalang',0,0,'L');
        // Line break
        $this->Ln(20);
        $this->SetFont('Arial','',10);

        //var utk simpan get Y paling atas
        $topY = $this->GetY();
        //var utk simpan get X paling atas
        $topX = $this->GetX();

        //garis horisontal paling atas tabel
        $this->Line($this->GetX(),$this->GetY(), $this->GetPageWidth()- $this->rMargin,$topY);

        //garis vertikal paling kiri tabel
        //y2 dikurangi 15
        //angka 15 didapatkan dari bagian footer
        $this->Line($this->GetX(),$this->GetY(), $this->GetX(),$this->GetPageHeight()-15);


        //cell header kolom pertama
        $this->MultiCell($lebar_kolom_no, 6, 'No.', 0,  'C');


        //sebelum render cell header kolom kedua
        //set XY
        $this->SetXY($this->GetX() + $lebar_kolom_no, $topY);
        //cell header kolom kedua
        $this->MultiCell($lebar_kolom_nama, 6, "Nama", 0,'C');


        //sebelum render cell header kolom ketiga
        //set XY
        $this->SetXY($this->GetX() + $lebar_kolom_no + $lebar_kolom_nama, $topY);
        //cell header kolom ketiga
        $this->MultiCell($lebar_kolom_nik, 6, "NIK", 0,'C');


        //sebelum render cell header kolom keempat
        //set XY
        $this->SetXY($this->GetX() + $lebar_kolom_no + $lebar_kolom_nik + $lebar_kolom_nama, $topY);
        //cell header kolom keempat
        $this->MultiCell($lebar_kolom_jk, 6, "JK", 0,'C');



        //sebelum render cell header kolom kelima
        //set XY
        $this->SetXY($this->GetX() + $lebar_kolom_no + $lebar_kolom_nik + $lebar_kolom_nama + $lebar_kolom_jk, $topY);
        //cell header kolom ke5
        $this->MultiCell($lebar_kolom_tempat_lahir, 6, "Tempat lahir", 0,'C');



        //sebelum render cell header kolom kelima
        //set XY
        $this->SetXY($this->GetX() + $lebar_kolom_tempat_lahir+ $lebar_kolom_no + $lebar_kolom_nik + $lebar_kolom_nama + $lebar_kolom_jk, $topY);
        //cell header kolom ke5
        $this->MultiCell($lebar_kolom_tanggal_lahir, 6, "Tanggal lahir", 0,'C');



        //garis horisontal penutup header tabel
        //nomor 2 dari atas
        $this->Line($this->GetX(),$this->GetY(), $this->GetPageWidth()-$this->rMargin,$this->GetY());

        //garis vertikal setelah kolom 1
        //ditambah dengan 10 karena itu adalah lebar kolom 1
        $this->Line($topX+$lebar_kolom_no,$topY, $topX+$lebar_kolom_no,$this->GetPageHeight()-15);


        //garis vertikal setelah kolom 2
        //ditambah dengan 40 karena itu adalah lebar kolom 1 + kolom 2
        $this->Line($topX+$lebar_kolom_no+$lebar_kolom_nama,$topY, $topX+$lebar_kolom_no+$lebar_kolom_nama,$this->GetPageHeight()-15);


        //garis vertikal setelah kolom 3
        //ditambah dengan 40 karena itu adalah lebar kolom 1 + kolom 2
        $this->Line($topX+$lebar_kolom_no+$lebar_kolom_nama + $lebar_kolom_nik,$topY, $topX+$lebar_kolom_no+$lebar_kolom_nik + $lebar_kolom_nama,$this->GetPageHeight()-15);


        //garis vertikal setelah kolom 4
        //ditambah dengan 40 karena itu adalah lebar kolom 1 + kolom 2
        $this->Line($topX+$lebar_kolom_no+$lebar_kolom_nama + $lebar_kolom_nik + $lebar_kolom_jk,$topY, $topX+$lebar_kolom_no+$lebar_kolom_nik + $lebar_kolom_jk + $lebar_kolom_nama,$this->GetPageHeight()-15);

        //garis vertikal setelah kolom 5
        //ditambah dengan 40 karena itu adalah lebar kolom 1 + kolom 2
        $this->Line($topX+$lebar_kolom_tempat_lahir + $lebar_kolom_no+$lebar_kolom_nama + $lebar_kolom_nik + $lebar_kolom_jk,$topY, $topX+ $lebar_kolom_tempat_lahir + $lebar_kolom_no+$lebar_kolom_nik + $lebar_kolom_jk + $lebar_kolom_nama,$this->GetPageHeight()-15);

        //garis vertikal setelah kolom 6
        //ditambah dengan 40 karena itu adalah lebar kolom 1 + kolom 2
        $this->Line($topX+ $lebar_kolom_tanggal_lahir + $lebar_kolom_tempat_lahir + $lebar_kolom_no+$lebar_kolom_nama + $lebar_kolom_nik + $lebar_kolom_jk,$topY, $topX+ $lebar_kolom_tanggal_lahir + $lebar_kolom_tempat_lahir + $lebar_kolom_no+$lebar_kolom_nik + $lebar_kolom_jk + $lebar_kolom_nama,$this->GetPageHeight()-15);


        //garis vertikal paling kanan
        $this->Line($this->GetPageWidth()-$this->rMargin,$topY, $this->GetPageWidth()-$this->rMargin,$this->GetPageHeight()-15);

    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Page number
        $this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');

        //garis horisontal paling bawah
        //penutup tabel
        //x1 adalah panjang margin kiri
        //x2 adalah lebar kertas  (margin kiri + margin kanan)

        $this->Line($this->lMargin,$this->GetPageHeight()-15, $this->GetPageWidth()-$this->rMargin,$this->GetPageHeight()-15);
    }
}

//variabel untuk lebar kolom
$lebar_kolom_no = 10;
$lebar_kolom_nama = 60;
$lebar_kolom_nik = 20;
$lebar_kolom_jk=10;
$lebar_kolom_tempat_lahir = 50;

//panjang kolom terakhir
//adalah 0
//supaya perpanjang otomatis selebar kertas
$lebar_kolom_tanggal_lahir = 0;
$tinggi_cell = 6;
$margin_kiri = 10;
$margin_kanan = 10;
$margin_atas = 10;




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetMargins($margin_kiri,$margin_atas,$margin_kanan);
$pdf->SetFont('Arial','',10);


$i = 1;
$sql = 'select pemohon.id, pemohon.nomor, ';
$sql = $sql . 'pemohon.nama, pemohon.nik, pemohon.jk, ';
$sql = $sql . 'pemohon.alamat, pemohon.tanggal_lahir, ';
$sql = $sql . 'kota.nama as tempat_lahir, ';
$sql = $sql . 'agama.nama as agama_pemohon, ';
$sql = $sql . 'nikah.nama as status_kawin, ';
$sql = $sql . 'pekerjaan.nama as pekerjaan_pemohon,';
$sql = $sql . 'negara.nama as kewarganegaraan ';

$sql = $sql . 'from pemohon ';
$sql = $sql . 'inner join kota on pemohon.id_kota = kota.id ';
$sql = $sql . 'inner join agama on pemohon.id_agama = agama.id ';
$sql = $sql . 'inner join nikah on pemohon.id_nikah = nikah.id ';
$sql = $sql . 'inner join pekerjaan on pemohon.id_pekerjaan = pekerjaan.id ';
$sql = $sql . 'inner join negara on pemohon.id_negara = negara.id ';
$sql = $sql . 'order by pemohon.nama ASC';


$stmt = $db->query($sql);

while ($pemohon = $stmt->fetch(PDO::FETCH_ASSOC)){


    //garis horisontal setiap record
    //x2 = lebar kertas dikurangi dengan margin kanan
    $pdf->Line($pdf->GetX(),$pdf->GetY(), $pdf->GetPageWidth()- $margin_kanan ,$pdf->GetY());


    //render cell kolom pertama
    $pdf->MultiCell($lebar_kolom_no, $tinggi_cell, $i, 0, 'R');


    //sebelum render cell record kolom kedua
    //setting X dan Y
    //x1 haruslah ditambah dengan lebar kolom pertama
    //y2 haruslah dikurangi dengan tinggi cell
    $pdf->SetXY($pdf->GetX() + $lebar_kolom_no, $pdf->GetY()-$tinggi_cell);

    //render cell kedua
    $pdf->MultiCell($lebar_kolom_nama, $tinggi_cell, $pemohon['nama'], 0,false);




    //sebelum render cell record kolom ketiga
    //setting X dan Y
    //x1 haruslah ditambah dengan lebar kolom pertama dan kolom kedua
    //y2 haruslah dikurangi dengan tinggi cell
    $pdf->SetXY($pdf->GetX() + $lebar_kolom_no + $lebar_kolom_nama, $pdf->GetY()-$tinggi_cell);

    //render cell ketiga
    $pdf->MultiCell($lebar_kolom_nama, $tinggi_cell, $pemohon['nik'], 0,false);





    //sebelum render cell record kolom keempat
    //setting X dan Y
    //x1 haruslah ditambah dengan lebar kolom pertama + kolom kedua + kolom ketiga
    //y2 haruslah dikurangi dengan tinggi cell
    $pdf->SetXY($pdf->GetX() + $lebar_kolom_no + $lebar_kolom_nama + $lebar_kolom_nik, $pdf->GetY()-$tinggi_cell);

    //render cell ketiga
    $pdf->MultiCell($lebar_kolom_jk, $tinggi_cell, $pemohon['jk'], 0,'C');




    $pdf->SetXY($pdf->GetX() + $lebar_kolom_jk + $lebar_kolom_no + $lebar_kolom_nama + $lebar_kolom_nik, $pdf->GetY()-$tinggi_cell);

    //render cell ketiga
    $pdf->MultiCell($lebar_kolom_tempat_lahir, $tinggi_cell, $pemohon['tempat_lahir'], 0,false);




    $pdf->SetXY($pdf->GetX() + $lebar_kolom_tempat_lahir + $lebar_kolom_jk + $lebar_kolom_no + $lebar_kolom_nama + $lebar_kolom_nik, $pdf->GetY()-$tinggi_cell);

    //render cell ketiga
    $pdf->MultiCell($lebar_kolom_tanggal_lahir, $tinggi_cell, date("d-m-Y", strtotime($pemohon['tanggal_lahir'])) , 0,'C');


    //untuk penomoran
    $i = $i + 1;

    $last_y = $pdf->GetY();


}

//gambar persegi panjang
//untuk menutupi
//ekor tabel yang tidak diperlukan
//x=0
//y=koordinat y terakhir di looping record
//h = tinggi kertas - (tinggi footer + y terakhir)
//warna putih, sesuai kertas
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->Rect(0,$last_y,$pdf->GetPageWidth(),$pdf->GetPageHeight() - (15 + $last_y),'F');



//gambar persegi panjang
//warna hitam selayaknya garis
//untuk garis tabel paling bawah
$pdf->SetFillColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($margin_kiri,$last_y,$pdf->GetPageWidth()-20,0.2,'F');


$pdf->Output();

?>
