<?php

require_once("Connection.php");
class JsonDisplayMarker {
    function getMarkers(){
        //buat koneksinya
        $connection = new Connection();
        $conn = $connection->getConnection();
        //buat responsenya
        $response = array();
        $code = "code";
        $message = "message";
          $link = $connection->getLink();
        try{
            //tampilkan semua data dari mysql
            $queryMarker = "SELECT * FROM desain";
            $getData = $conn->prepare($queryMarker);
            $getData->execute();
            $result = $getData->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $data){
                $response1 = array();
                $queryMarker1 = "SELECT * FROM jenis_pekerjaan";
                $getData1 = $conn->prepare($queryMarker1);
                $getData1->execute();
                $result1 = $getData1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result1 as $data1) {
                    $response2 = array();
                    $queryMarker2 = "SELECT * FROM uraian_pekerjaan WHERE id_jenis=".$data1['id']." AND id_desain=".$data['id'];
                    $getData2 = $conn->prepare($queryMarker2);
                    $getData2->execute();
                    $result2 = $getData2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result2 as $data2) {
                        $response4 = array();
                        $hrgs = 0;
                        $queryMarker4 = "SELECT * FROM sub_pekerjaan WHERE id_uraian=".$data2['id'];
                        $getData4 = $conn->prepare($queryMarker4);
                        $getData4->execute();
                        $result4 = $getData4->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result4 as $data4) {
                            array_push($response4,
                                array(
                                    'id_sub'=>$data4['id'],
                                    'keterangan'=>$data4['keterangan'],
                                    'volume'=>$data4['volume'],
                                    'harga'=>$data4['harga'])
                            );
                            $hrgs=$hrgs+$data4['harga'];
                        }
                        array_push($response2,
                            array(
                                'id_uraian'=>$data2['id'],
                                'pekerjaan'=>$data2['pekerjaan'],
                                'volume'=>$data2['volume'],
                                'satuan'=>$data2['satuan'],
                                'sub'=>$response4,
                                'hargasatuan'=>$hrgs."")
                        );
                    }
                    array_push($response1,
                        array(
                            'id_jenis'=>$data1['id'],
                            'jenispekerjaan'=>$data1['jenispekerjaan'],
                            'uraian'=>$response2)
                    );
                }
                $response3 = array();
                $queryMarker3 = "SELECT * FROM gambar WHERE id_desain=".$data['id'];
                $getData3 = $conn->prepare($queryMarker3);
                $getData3->execute();
                $result3 = $getData3->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result3 as $data3) {
                    array_push($response3,
                            array(
                                'id_gambar'=>$data3['id'],
                                'id_desain'=>$data3['id_desain'],
                                'namaruangan'=>$data3['namaruangan'],
                                'gambar'=>$link.'images/upload/'.$data3['gambar'],
                                'deskripsi'=>$data3['deskripsi'])
                        );
                }
                array_push($response,
                    array(
                        'id_desain'=>$data['id'],
                        'namadesain'=>$data['namadesain'],
                        'deskripsi'=>$data['deskripsi'],
                        'uraian_pekerjaan'=>$response1,
                        'gambar'=>$link.'images/upload/'.$data['gambar'],
                        'listgambar'=>$response3)
                    );
            }
        }catch (PDOException $e){
            echo "Failed displaying data".$e->getMessage();
        }
        //buatkan kondisi jika berhasil atau tidaknya
        if($queryMarker){
            echo json_encode(
                array("result"=>$response,$code=>1,$message=>"Success")
            );
        }else{
            echo json_encode(
                array("result"=>$response,$code=>0,$message=>"Failed displaying data")
            );
        }
    }
}
$location = new JsonDisplayMarker();
$location->getMarkers();

?>