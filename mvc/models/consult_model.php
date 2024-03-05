<?php

/* Consults the IDs in students table that match the filter:
    @param $query : str
    @param $filter : str
    @return $ids : array
*/
function getIds($query, $filter)
{
    try
    {
        require ("connection.php");

        $cursor = $cnxn -> prepare(strval($query));
        $cursor -> execute([$filter]);
        $ids = $cursor -> fetchAll();

        return $ids;
    }
    catch(Exception $e)
    {
        die ("--- ERROR! ---\n" . __FILE__ . " Dropped an exception:\n" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


function offChanged()
{
    $URL = "https://sival-db-default-rtdb.firebaseio.com/recData/-NTFoCTGynA-Rox42s3K/changed.json";

    $ucurl = curl_init();
    curl_setopt($ucurl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ucurl, CURLOPT_URL, $URL);
    curl_setopt($ucurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ucurl, CURLOPT_POSTFIELDS, '"n"');
    curl_setopt($ucurl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

    curl_exec($ucurl);

    curl_close($ucurl);
}


function seekNews()
{
    try
    {
        $URL = "https://sival-666-default-rtdb.firebaseio.com/recData.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        $data = json_decode($response, true);

        foreach ($data as $key => $value) {
            if ($data[$key]["changed"] == "y")
            {
                require ("connection.php");
                $cursor = $cnxn -> prepare("INSERT INTO entrances(student_id) SELECT (A1.student_id) FROM students A1 WHERE A1.enrollment = ?;");
                $cursor -> execute([$data[$key]["last_scan"]]);
                $cnxn = null;
            }
        }
        curl_close($curl);

        offChanged();
    }
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
}


/* Executes the filtered query to the DB:
    @param $query : str
    @return $results : array
*/
function getResults($query)
{
    try
    {
        seekNews();

        require ("connection.php");

        $cursor = $cnxn -> prepare(strval($query));
        $cursor -> execute();
        $results = $cursor -> fetchAll();

        return $results;
    }
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}

?>
