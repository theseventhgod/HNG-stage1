<?php

require_once __DIR__ . '/config.php';
class API{
    function Select(){
        $db = new Connect;
        $users = array();
        $data = $db->prepare ('SELECT *FROM users ORDER BY id');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$OutputData['id']] = array(
                'id' => $OutputData['id'],
                'slackusername' => $OutputData['slackusername'],
                'backend' => $OutputData['backend'],
                'age' => $OutputData['age'],
                'bio' => $OutputData['bio']
            );
        }
    return json_encode($users);
    }

}
$API = new API;
header('Content-Type: application/json');
echo $API->Select();

//still working the kinks, it's not exactly smooth. Thanks
?>
