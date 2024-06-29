<!DOCTYPE html>
<html>
    <head>
        <title>Monitoring Data</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="../assets/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
        <script type="text/javascript" src="../jquery-latest.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
        <link rel="stylesheet" href="../style_new.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Get chart data -->
         <script type="text/javascript">
            function getData() {
                var nama = encodeURIComponent($('#nama').val());
                if (nama === '') {
                    $('#empty-data').html('<div class="emptystate"><img class="empty-image" src="../assets/img/empty_data.jpg" alt=""><div class="text-empty">Silahkan masukkan nama pasien terlebih dahulu! </br> Pastikan juga nama pasien sudah ada dalam daftar pasien</div></div>')
                    $('#responsecontainer').html('');
                    $('#responsecontainer1').html('');
                    $('#responsecontainer2').html('');
                } else {
                    $('#empty-data').html('');
                    $.ajax({
                        type: "POST",
                        url: "data/updateData.php",
                        data: { nama: nama },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    })
                    $('#responsecontainer').load('../data/dataSuhu.php?nama=' + nama);
                    $('#responsecontainer1').load('../data/dataHearrate.php?nama=' + nama);
                    $('#responsecontainer2').load('../data/dataSaturation.php?nama=' + nama);
                }
            }

            $(document).ready(function() {
                $('#stopButton').click(function(){
                    $.ajax({
                        type: "POST",
                        url: "../data/deleteUpdateData.php",
                        data: {},
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                })
            })

            $(document).ready(function() {
                $('#filterButton').click(function() {
                    getData();
                });
                var refreshId = setInterval(function(){
                getData();
            }, 1000);
            })
         </script>
    </head>
    <body>
        <!-- Navbar -->
         <div class="container">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo_item">
                        <div id="healtHub"><span id="health">Health</span><span id="hub">Hub</span></div>
                    </div>
                </div>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="beranda_screen.php">Beranda</a></li>
                        <li><a href="data_pasien_screen.php">Data Pasien</a></li>
                        <li><a href="chart_screen">Monitoring</a></li>
                    </ul>
                </div>
            </nav>
         </div>
        <!-- Content -->
         <!-- Monitoring Data -->
        <div class="main-content">
            <div class="container">
                <h3>Monitoring Data</h3>
                <div class="form-inline">
                    <input type="text" class="form-control" id="nama" placeholder="Nama">
                    <button class="btn btn-primary" id="filterButton">Mulai</button>
                    <button class="btn btn-secondary" id="stopButton">Berhenti</button>
                </div>
            </div>
            <div class="constainer" id="empty-data"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="responsecontainer1" style="margin-top: 20px;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="responsecontainer2" style="margin-top: 20px;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="responsecontainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>