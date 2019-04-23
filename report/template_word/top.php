<?php
    $report_name = $_GET["report_name"];

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; filename=".$report_name);

echo '<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>

#ftable {
    border-collapse: collapse;
    width: 100%;
}

#ftd, #ftr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="20%"><div align="center"><img src="http://localhost/image/simbol/kumham.png" width="100" height="100" /></div></td>
    <td width="80%"><div align="center">KEMENTERIAN  HUKUM  DAN  HAK ASASI  MANUSIA RI<br />
      KANTOR  WILAYAH JAWA TENGAH<br />
      <strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />
      Jalan Perintis Kemerdekaan No. 110, Pemalang<br />
      Telepon (0284) 325010 Faksimili (0284) 324219<br />
    </div></td>
  </tr>
  <br>
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>';

echo '</tr>
</table>';
?>
