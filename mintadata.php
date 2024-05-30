<?php

    function mintadata($host, $port, $pesan)
    {
        //buat socket
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        //koneksi ke socket
        $result = socket_connect($socket, $host, $port);
        //uji apakah berhasil
        if($result == false) return false; //apabila gagal

        //untuk menguji koneksi, maka server akan kirim data
        socket_write($socket, $pesan, strlen($pesan));

        //tangkap respon dari nodemcu
        $data_diterima = socket_read($socket, $port); //port 0 - 65.535
        //close socket
        socket_close($socket);

        //kembalikan hasil yang diterima dari nodemcu (respon nodemcu)
        return $data_diterima;
    }

    //eksekusi function mintadata
    $hasil = mintadata('192.168.99.22', '1223', 'minta');
    //cetak hasil
    echo $hasil;

?>