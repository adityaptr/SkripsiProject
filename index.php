<!DOCTYPE html>
<html>
<head>
    <title>Sensor Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <script type="text/javascript">
        function bacaData()
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    //baca nilai data sensor
                    var data = xmlhttp.responseText;
                    // Memproses data dan menampilkan ke elemen HTML
                    var parsedData = JSON.parse(data);
                    var pir = parsedData.pir;
                    var reed = parsedData.reed;
                    var nilai_pir = mapPirValue(pir);
                    var nilai_reedswitch = mapReedValue(reed);
                    document.getElementById('nilai_pir').textContent = nilai_pir;
                    document.getElementById('nilai_reedswitch').textContent = nilai_reedswitch;
                }
            }
            //eksekusi file mintadata.php
            xmlhttp.open("GET", "mintadata.php", true);
            xmlhttp.send();
        }

        function mapPirValue(value) {
            if (value === 1) {
                return "Gerakan Terdeteksi";
            } else if (value === 0) {
                return "Gerakan Tidak Terdeteksi";
            } else {
                return "Nilai tidak valid";
            }
        }

        function mapReedValue(value) {
            if (value === 1) {
                return "Pintu Tertutup";
            } else if (value === 0) {
                return "Pintu Terbuka";
            } else {
                return "Nilai tidak valid";
            }
        }

        //proses realtime
        $(document).ready(function(){
            setInterval(function(){
                bacaData();
            }, 2000);
        });
    </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://192.168.99.17/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Face Recognition Access Control
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Sensor Secara Real Time</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="sensor-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <div style="display: flex; justify-content: center">
                                                        <div class="card" style="width: 50%">
                                                            <div class="card-header" style="font-size: 30px; font-weight: bold; background-color: red; color: white">
                                                                Sensor PIR
                                                            </div>
                                                            <div class="card-body">
                                                                <h1>
                                                                    <span id="nilai_pir">0</span>
                                                                </h1>
                                                            </div>
                                                        </div>

                                                        <div class="card" style="width: 50%">
                                                            <div class="card-header" style="font-size: 30px; font-weight: bold; background-color: blue; color: white">
                                                                Sensor Reed Switch
                                                            </div>
                                                            <div class="card-body">
                                                                <h1>
                                                                    <span id="nilai_reedswitch">0</span>
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer" style="width: auto">
                <div class="float-right d-none d-sm-inline">
                    Sensor Dashboard
                </div>
                <strong>&copy; Tugas Akhir 2 - 2023</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            loadSensorData();

            var source = new EventSource('/realtime-data');
            source.addEventListener('message', updateRealtimeData);
        });

        function updateSensorData(data) {
            var tableBody = $('#sensor-table tbody');
            tableBody.empty();

            for (var i = 0; i < data.length; i++) {
                var row = $('<tr>');
                row.append($('<td>').text(data[i].timestamp));
                row.append($('<td>').text(data[i].value));
                tableBody.append(row);
            }
        }

        function loadSensorData() {
            $.get('/sensor-data', function(data) {
                updateSensorData(data);
            }).fail(function() {
                console.error('Error: Data sensor tidak dapat dimuat');
            });
        }

        function updateRealtimeData(event) {
            var data = JSON.parse(event.data);
            updateSensorData([data]);
        }
    </script>
</body>
</html>