<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: ProfToTA.php

    Description:
        This file does one of 4 things:
    1. Assign Prof as Head Supervisor for TA
    2. Assign Prof as CoSupervisor for TA
    3. Remove Prof as Head Supervisor for TA - ILLEGAL!
    4. Remove Prof as CoSupervisor for TA
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Add a Prof</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    
    $tauserid      = $_POST["tauserid"];
    $tafirstname   = $_POST["tafirstname"];
    $talastname    = $_POST["tafirstname"];
    
    $profuserid    = $_POST["profuserid"];
    $proffirstname = $_POST["proffirstname"];
    $proflastname  = $_POST["proflastname"];
    
    $getprofid = 'select userid from INSTRUCTOR where
                        userid="'.$profuserid.'" '.
                    'OR (firstname="'.$proffirstname.'" AND lastname="'.$proflastname.'")';
    
    $getTaId = 'select userid from TEACHINGASSISTANT where
                        userid="'.$tauserid.'" '.
                    'OR (firstname="'.$tafirstname.'" AND lastname="'.$talastname.'")';
    
    $getprofid_result = mysqli_query($connection, $getprofid);
    $gettaid_result   = mysqli_query($connection, $getTaId);
    
    if ($getprofid_result && $gettaid_result)
    {
        if (mysqli_num_rows($getprofid_result) == 1 && mysqli_num_rows($gettaid_result) == 1)
        {  
            $final_profid = mysqli_fetch_assoc($getprofid_result)["userid"];
            $final_taid   = mysqli_fetch_assoc($gettaid_result)["userid"];
            
            if($_POST['submit']==0) // Assign Prof as Head Supervisor for TA
            {
                $assign =
                    'UPDATE TEACHINGASSISTANT'.
                    'set profuserid="'.$final_profid.'" '.
                    'where userid="'.$final_taid.'"';
                
                if (mysqli_query($connection, $assign)) {
                    echo 'Update Successful: '.$final_profid.' assigned as Head Prof to TA '.$final_taid.'.';
                } else {
                    echo 'Update failed: could not assign '.$final_profid.' to TA '.$final_taid.'.';
                }
            }
            else if($_POST['submit']==1) // Assign Prof as CoSupervisor for TA
            {
                // Check if the prof is already a cosupervisor
                $check_for_coprof = 'select * from CoSUPERVISE where '.
                    'profuserid="'.$final_profid.
                    'AND tauserid="'.$final_taid.'"';
                
                $coprof_result = mysqli_query($connection, $check_for_coprof);
                if ($coprof_result) {
                    if (mysqli_num_rows($coprof_result) > 0) {
                        echo 'Prof '.$final_profid.' is already a cosupervisor of TA '.$final_taid;
                    } else {
                        // insertion happens here
                        $assign_coprof = 'INSERT INTO CoSUPERVISE (profuserid, tauserid) '
                            .'VALUES("'.$final_profid.'", "'.$final_taid.'")';
                        
                        if (mysqli_query($connection, $assign_coprof)) {
                            echo 'Prof '.$final_profid.' successfully assigned as CoSupervisor of TA '.$final_taid;
                        } else {
                            echo 'Insertion failed info CoSUPERVISE';
                        }
                    }
                } else {
                    echo 'database query failed, try again';
                }
            }
            else if($_POST['submit']==2) // Remove Prof as Head Supervisor for TA
            {
                // This is an illegal operation - we need to fix this!
                // This is not in the assignment spec and should be removed!!!
                $removeHeadProf =
                    'UPDATE TEACHINGASSISTANT'.
                    'set profuserid=NULL'.
                    'where userid="'.$final_taid.'"';
                
                if(mysqli_query($connection, $removeHeadProf)) {
                    echo 'Successfully removed head prof '.$final_profid.' from TA '.$final_taid;
                } else {
                    echo 'FAILED: removing head prof '.$final_profid.' from TA '.$final_taid;
                }
            }
            else if($_POST['submit']==3) // Remove Prof as CoSupervisor for TA
            {
                $removeCoSupservise = 'DELETE FROM CoSUPERVISE where '.
                                        'profuserid="'.$final_profid.'" '
                                        .'AND tauserid="'.$final_taid.'"';
                
                if (mysqli_query($connection, $removeCoSupservise)) {
                    echo "Succefully removed prof as cosupervisor of ta";
                } else {
                    echo "Something whent wrong!";
                }
            }
        } else {
            echo 'more than one ta or prof exists with the same info!';
            echo 'Prof ids';
            while ($row = mysqli_fetch_assoc($getprofid_result)) {
                echo "<li>";
                echo $row;
            }
            echo 'TA ids:';
            while ($row = mysqli_fetch_assoc($gettaid_result)) {
                echo "<li>";
                echo $row;
            }
        }
    } else {
        if (!$getprofid_result) {
            echo 'Prof not found in INSTRUCTOR database';
        }
        if (!$getprofid_result) {
            echo 'TA not found in TEACHINGASSISTANT database';
        }
    }
    
    mysqli_close($connection);
    ?>
</body>
</html>
