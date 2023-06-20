<?php 
function checkconnect($apikey){
    $url = "https://chothuesimcode.com/api?act=account&apik=".$apikey;
    $response = json_decode(file_get_contents($url));
    return $response->ResponseCode;
}
?>
<form action="" method="post">
        Nhập api: <input type="text" name="api" id="">
        <input type="submit" name="ok" value="OK"> 
</form>
<?php 
    if(isset($_POST['ok'])){
        if(checkconnect($_POST['api'])==0){
            echo "ok";
        }
        else
            echo "false";
    }
?>