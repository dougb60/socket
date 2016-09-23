<?php

// set some variables
$host = "127.0.0.1";
$port = 25003;
$con = 1;
// don't timeout!
set_time_limit(0);
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Impossivel criar conexão\n");
// bind socket to port
$result = socket_bind($socket, $host, $port) or die("Impossivel estabelecer conexão\n");
// start listening for connections
$result = socket_listen($socket, 3) or die("Impossivel ouvir conexão\n");
while($con == 1){
// accept incoming connections
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die("Impossivel receber conexão\n");
// read client input
$input = socket_read($spawn, 1024) or die("Impossivel ler entrada\n");
//echo $input;
// clean up input string
if($input == 'sair'){
$output = "MORRI!";
socket_write($spawn, $output, strlen ($output)) or die("Impossivel enviar mensagem\n");
socket_close($spawn);
socket_close($socket);
$con = 0;	
}
elseif ($con == 1){
$num_rand = rand(1,10);
if($input == $num_rand){
	$output = 'Você acertou, eu escolhi o numero'.$num_rand;
	socket_write($spawn, $output, strlen ($output)) or die("Impossivel enviar mensagem\n");
}else{
	$output = 'Você errou, eu escolhi o numero'.$num_rand;
	socket_write($spawn, $output, strlen ($output)) or die("Impossivel enviar mensagem\n");
}	
	

echo '<br>'.date('d/m/Y:H-m-s')." Mensagem do cliente : ".$input;
// reverse client input and send back


// close sockets
}
}

