<!DOCTYPE html>
<html>
    <head>
        <title>Ajax Jquery - Belajarphp.net</title>
    </head>
    <body>
        <form action="">
            <table>
                <tr><td>Masukan Judul</td><td><input type="text" onkeyup="isi_otomatis()" id="masukanjudul"></td></tr>
                <tr><td>Topik</td><td><select name = "topik" id='topik'>
                    <option value="">Pilih Topik</option>
                    <option value="Pengembangan Sistem">Pengembangan Sistem</option>
                    <option value="Forensik Digital">Forensik Digital</option>
                    <option value="Keamanan Komputer">Keamanan Komputer</option>
                    <option value="Sistem Pendukung Keputasan">Sistem Pendukung Keputasan</option>
                    <option value='Jaringan Komputer'>Jaringan Komouter</option>
                    <option value='Machine Learning'>Machine Learning</option>
                    <option value='Data Mining'>Data Mining</option>
                    <option value='Algoritma Pencarian'>Algoritma Pencarian</option>
                    <option value='Media Pembelajaran'>Media Pembelajaran</option>
                    <option value='Pengolahan Citra'>Pengolahan Citra</option>
                    <option value='Pengolahan Bahasa Alami'>Pengolahan Bahasa Alami</option>
                    <option value='Interaksi Manusia dan Komputer'>Interaksi Manusia dan Komputer</option>
                    <option value='Sistem Pakar'>Sistem Pakar</option>
                    <option value='Multimedia'>Multimedia</option>
                    <option value='Kriptografi'>Kriptografi</option>
                    <option value='Game'>Game</option>
                    <option value='Web Indexing'>Web Indexing</option>
                </select></tr></td>
            </table>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var masukanjudul = $("#masukanjudul").val();
                $.ajax({
                    url: 'ajax1.php',
                    data:"masukanjudul="+masukanjudul ,
                }).success(function (data1) {
                    var json = data1,
                    obj = JSON.parse(json);
                    $("#topik").val(obj.Topik);
                });
            }
        </script>
    </body>
</html>