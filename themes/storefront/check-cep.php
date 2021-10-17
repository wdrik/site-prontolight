<?php

$pcep = str_replace(array('.','-','‑'), array('','',''),trim($_REQUEST['cep']));
$cep = (int) $pcep;

$grandeSP = array(
	array(6400001,6499999),
	array(6300001,6399999),
	array(6700001,6729999),
	array(9900001,9999999),
	array(6800001,6849999),
	array(7000001,7399999),
	array(6850001,6889999),
	array(6000001,6299999),
	array(6500001,6549999),
	array(9000001,9299999),
	array(9600001,9899999),
	array(9500001,9599999),
	array(6750001,6799999)

);

if($cep<999999){
	echo '<h2 style="color:tomato; margin-bottom:10px; font-size:18px;"><i class="fas fa-check-circle"></i> Informe um CEP válido.</h2>'; 
	return;
}


foreach ($grandeSP as $key => $value) {
	if(($cep>=$value[0])&&($cep<=$value[1])){
		echo '<h2 style="color:#39a01c; margin-bottom:10px; font-size:18px;"><i class="fas fa-check-circle"></i> Sim, entregamos na sua região.</h2>'; 
		echo '<p>Você está na Grande São Paulo.</p>'; 
		return;
	}
}


$interioSP = array(
	array(13000000,13139999),
	array(13270000,13279999),
	array(13280000,13280000),
	array(13290000,13290000),
	array(13250000,13259999),
	array(13295000,13295000),
	array(13200000,13219999)
);


foreach ($interioSP as $key => $value) {
	if(($cep>=$value[0])&&($cep<=$value[1])){
		echo '<h2 style="color:#1e4063; margin-bottom:10px; font-size:18px; text-transform:initial;"><i class="fas fa-check-circle"></i> Para região de Campinas as compras são válidas apenas por WhatsApp.<br /><br /><a href="">Clique aqui e veja o cardápio.</a></h2>'; 
		echo '<p>Você está no interior de São Paulo.</p>'; 
		return;
	}
}




$capitalSP = array(
	array(1000000,1599999),
	array(4000000,4999999),
	array(5000000,5899999),
	array(5000000,5899999),
	array(2000000,2999999),
	array(3000000,8499999)
);




foreach ($capitalSP as $key => $value) {
	if(($cep>=$value[0])&&($cep<=$value[1])){
		echo '<h2 style="color:#39a01c; margin-bottom:10px; font-size:18px;"><i class="fas fa-check-circle"></i> Sim, entregamos na sua região.</h2>'; 
		echo '<p>Você está em São Paulo - Capital.</p>'; 
		return;
	}
}



		echo '<h2 style="color:tomato; margin-bottom:10px; font-size:18px;"><i class="fas fa-exclamation-triangle"></i> Não entregamos na sua região ainda.</h2>'; 
		echo '<p>Digite outro CEP para fazer uma nova pesquisa.</p>'; 





?>
