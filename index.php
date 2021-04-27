<?php         
$array=[
    'POSTGRES'=>'5432',
    'MYSQL'=>'3306',
    'RDP'=>'3389',
    'HTTP'=>'80',
    'FTP'=>'21',
    'SFTP'=>'115',
    'SSH'=>'22',
    'TELNET'=>'23',
    'SMTP'=>'25',
    'DNS'=>'53',
    'POP3'=>'110',
    'IMAP4'=>'143',
    'HTTPS'=>'443',
    'SMTP-SSL'=>'465',
    'SMTP-TLS'=>'587',
];
$msg ='';
if ($_POST){
    $ip = addslashes($_POST['ip']); //"192.168.10.8";
    $porta = addslashes($_POST['porta']); //"5432";
    $fp = @fsockopen($ip, $porta, $errno, $errstr, 1); //O @ suprime algum erro
    // Verificando o resultado
    if($fp >= 1){
        $msg = '<br><br>   <div class="alert alert-success" role="alert"> <b>PORTA ABERTA</b>  </div>';
    } else {
        $msg = '<br><br>   <div class="alert alert-danger" role="alert"> <b>PORTA FECHADA</b> </div>';
    }                
}    
?>   
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTADOR DE REDIRECIONAMENTO</title>
    <!-- CSS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <link rel="stylesheet" href="./css/select2.min.css" />  
</head>
<body>
    <div class="col-md-12">
        <div class="container">
        <br>
            <div class="card">
                <div class="card-body">
                    <h4 class="">TESTAR PORTA</h4>
                    <form class="" method="post">                    
                        <div class="form-group"> 
                            <label>IP</label>
                            <input type="text" required name="ip" id="ipAddress" ip-mask class="form-control col-sm-2" 
                              placeholder="192.168.10.8" value="<?= (isset($_POST['ip']))? $_POST['ip'] :'' ?>" >                            
                        </div>
                        <div class="form-group"> 
                            <label>PORTA</label>
                            <input type="text" required name="porta" class="form-control col-sm-1" placeholder="5432" value="<?= (isset($_POST['porta']))? $_POST['porta'] :'' ?>">
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check "></i> Testar </button>
                    </form> 
                    <?= $msg;?>
                </div>      
            </div>               
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="./js/popper.min.js"> </script>
<script src="./js/bootstrap.min.js"> </script>  
<script src="./js/select2.min.js"></script>
<script src="./js/i18n/pt-BR.js"></script> 
<script src="./js/mask.ip-input.js"></script>
<script>
$(document).ready(function(){
    $('[ip-mask]').ipAddress();
});
</script>