
    <?php
     function input_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function postdata($url, $masukanjudul){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n\t\"masukanjudul\":\"$masukanjudul\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    function getdata($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    ?>
    <?php
        $masukanjudul = "";
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $masukanjudul = input_data($_GET["judul_topik"]);
            $data = postdata("http://127.0.0.1:5002/api1",$masukanjudul);
            $dataada= getdata("http://127.0.0.1:5002/api1");

            $obj = json_decode($dataada, true);


            foreach ($obj as $key) {
                $ps = $key["value"];
                $fd = $key["value1"];
                $kk = $key["value2"];
                $spk = $key["value3"];
                $jk = $key["value4"];
                $ml = $key["value5"];
                $dm = $key["value6"];
                $ap = $key["value7"];
                $mp = $key["value8"];
                $pc = $key["value9"];
                $pba = $key["value10"];
                $imk = $key["value11"];
                $sp = $key["value12"];
                $m = $key["value13"];
                $k = $key["value14"];
                $g = $key["value15"];
                $wi = $key["value16"];

                $data = array($ps,$fd,$kk,$spk,$jk,$ml,$dm,$ap,$mp,$pc,$pba,$imk,$sp,$m,$k,$g,$wi);
                rsort($data);
                if($data[0]==$ps){$dataygdikirim = array('Topik' => '1');}
                elseif($data[0]==$fd){$dataygdikirim = array('Topik' => '2');}
                elseif($data[0]==$kk){$dataygdikirim = array('Topik' => '3');}
                elseif($data[0]==$spk){$dataygdikirim = array('Topik' => '4');}
                elseif($data[0]==$jk){$dataygdikirim = array('Topik' => '5');}
                elseif($data[0]==$ml){$dataygdikirim = array('Topik' => '6');}
                elseif($data[0]==$dm){$dataygdikirim = array('Topik' => '7');}
                elseif($data[0]==$ap){$dataygdikirim = array('Topik' => '8');}
                elseif($data[0]==$mp){$dataygdikirim = array('Topik' => '9');}
                elseif($data[0]==$pc){$dataygdikirim = array('Topik' => '10');}
                elseif($data[0]==$pba){$dataygdikirim = array('Topik' => '11');}
                elseif($data[0]==$imk){$dataygdikirim = array('Topik' => '12');}
                elseif($data[0]==$sp){$dataygdikirim = array('Topik' => '13');}
                elseif($data[0]==$m){$dataygdikirim = array('Topik' => '14');}
                elseif($data[0]==$k){$dataygdikirim = array('Topik' => '15');}
                elseif($data[0]==$g){$dataygdikirim = array('Topik' => '16');}
                elseif($data[0]==$wi){$dataygdikirim = array('Topik' => '17');}
                // 
                else{$dataygdikirim = array('Topik' => 'Tidak Ada');}
                echo json_encode($dataygdikirim);
                
                

            } 
            
        }
        

       
    ?>