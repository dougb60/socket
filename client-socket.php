<?php

$host    = "127.0.0.1";
$port    = 25003;
$html = 'Diga um numero de 1 - 10 - "sair" para encerrar conex<br><form method="post"><input type = "text" name="valor"><input type="submit" value="enviar">';
echo $html;

if(count($_POST) > 0){
$post = $_POST["valor"];

}
$message = $post;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Impossivel criar conexão\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Impossivel estabelecer conexão com o servidor\n");  
// send string to server
socket_write($socket, $message, strlen($message)) or die("Impossivel enviar mensagem\n");
// get server response
$result = socket_read ($socket, 1024) or die("Impossivel ler entrada\n");
echo  "<br>". date('Y/m/d:H-m-s')." Resposta do Servidor  :".$result;
// close socket






/*$socket = socket_create(AF_INET, SOCK_STREAM, 0);

$ip_destino = '127.0.0.1';
$porta = 9989;

$ligacao = socket_connect($socket, $ip_destino, $porta);

$mensagem = "Ola, servidor";
$tamanho_envio = strlen($mensagem);

$operacao_enviar = socket_send($socket, $mensagem, $tamanho_envio, 0);

$tamanho_resposta = 2045;

$operacao_receber = socket_recv($socket, , $flags)
*/