<?php

/* Creates the visitor register:
    @param $visitor_fname : str
    @param $last_name : str
    @param $ocupation : str
    @param $visit_area : str
    @param $reason : str
    @param $qr_data : str
    @param $qr_pic : str
*/
function createVisitor($visitor_fname, $last_name, $ocupation, $visit_area, $reason, $qr_data, $qr_pic, $qr_status)
{
    try
    {
        $URL = "https://sival-666-default-rtdb.firebaseio.com/visitors.json";
        $vdata = [$visitor_fname, $last_name, $ocupation, $visit_area, $reason, $qr_data, $qr_pic, $qr_status];
        $keys = array("visitor_fname", "last_name", "ocupation", "visit_area", "reason", "qr_data", "qr_pic", "qr_status");
        $json_array = array_combine($keys, $vdata);
        $data = json_encode($json_array);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($curl);
    }
    catch(Exception $e)
    {
        echo "curl_exec() failed: " . curl_errno($curl) . "\n";
        die ("--- ERROR! --- '" . __FILE__ . $response . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        curl_close($curl);
    }
}


/* Get all pendant visits:
    @return $results : array of arrays
*/
function readVisitors()
{
    try
    {
        $URL = "https://sival-666-default-rtdb.firebaseio.com/visitors.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        
        $data = json_decode($response, true);
        
        return $data;
    }
    catch(Exception $e)
    {
        echo "curl_exec() failed: " . curl_errno($curl) . "\n";
        die ("--- ERROR! --- '" . __FILE__ . $response . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        curl_close($curl);
    }
}


/* Updates visits to accepted status:
    @param $visitor_id : json key
    @return $results : array of arrays
*/
function acceptVisitor($visitor_id)
{
    try
    {
        $data = '"active"';
        $URL = "https://sival-666-default-rtdb.firebaseio.com/visitors/".$visitor_id."/qr_status.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

        $response = curl_exec($curl);
    }
    catch(Exception $e)
    {
        echo "curl_exec() failed: " . curl_errno($curl) . "\n";
        die ("--- ERROR! --- '" . __FILE__ . $response . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        curl_close($curl);
    }
}


/* Updates visits to accepted status:
    @param $visitor_id : json key
    @return $results : array of arrays
*/
function expireVisitor($visitor_id)
{
    try
    {
        $data = '"expired"';
        $URL = "https://sival-666-default-rtdb.firebaseio.com/visitors/".$visitor_id."/qr_status.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

        $response = curl_exec($curl);
    }
    catch(Exception $e)
    {
        echo "curl_exec() failed: " . curl_errno($curl) . "\n";
        die ("--- ERROR! --- '" . __FILE__ . $response . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        curl_close($curl);
    }
}


/* Get all pendant visits:
    @return $results : array of arrays
*/
function readLogs()
{
    try
    {
        $URL = "https://sival-666-default-rtdb.firebaseio.com/logs.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        
        $data = json_decode($response, true);
        
        return $data;
    }
    catch(Exception $e)
    {
        echo "curl_exec() failed: " . curl_errno($curl) . "\n";
        die ("--- ERROR! --- '" . __FILE__ . $response . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        curl_close($curl);
    }
}

?>
