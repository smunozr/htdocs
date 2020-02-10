<?php
    $curl=curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones/?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJzZXJnaW9tdW5ydTZAaG90bWFpbC5jb20iLCJqdGkiOiJkNzZmY2FmMi0xNzFjLTQ1MzMtOGE1My1iZGZlY2JlNzcxY2QiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTU4MDM4NTI0MCwidXNlcklkIjoiZDc2ZmNhZjItMTcxYy00NTMzLThhNTMtYmRmZWNiZTc3MWNkIiwicm9sZSI6IiJ9.2n-DPfRzPi-nGTK87thZPeaFsSGeqmgQLEp4th-zpI4",
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST=>"GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

    $response =curl_exec($curl);
    $err=curl_error($curl);

    if($err){
        echo "cURL Error #:".$err;
    }else{
        var_dump($response);
        $obj=json_decode($response);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $obj->datos,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>"GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response=curl_exec($curl);
        $err=curl_error($curl);

        if(!$err){
            $datos=json_decode(utf8_encode($response),true);
            foreach ($datos as $dato){
                print_r($dato);
                print "</br>";}
        }
    }
    curl_close($curl);
