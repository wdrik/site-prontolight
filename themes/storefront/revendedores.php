<?php

/* Template Name: Revendedores */


get_header();

?>

	<style>
		.div-content{ max-width: 990px; margin:0 auto;}
		.div-content h1{ font-size: 32px; text-align: center; }
		.div-content h2{ font-size: 32px; margin:0 0 20px 0; font-weight: normal; }
		.div-content h2 strong{ font-weight: bold; }

		.div-row {}
		.div-row:after { content:" "; display: block; clear: both; }
		.div-col-50{ width:50%; float:left !important; padding: 0 0 0 0; margin: 0 0 0 0;   }
		.div-col-50 h2{ text-align: left !important; }

		.div-form{ padding:40px; }
		.div-form h2{ text-align: center !important; margin:0 0 20px 0; }
		.div-form p{ text-align: center  !important; }
		form > p { margin-bottom: 0; width: 100%; }
		form > p input{  width:100%; }
		.wpcf7-form-control.wpcf7-submit{ margin-top:10px;  }

		@media (max-width: 768px){

			#first-section{ margin-top:90px; }
		.div-form{ padding:20px; }

		.div-row {}
		.div-col-50{ width:100%; float:left !important; padding: 0 0 0 0; margin: 0 0 0 0;   }
		.hide-in-mobile{ display: none !important; }



		}

	</style>

<div class="div-content" id="first-section">
	<h1>Seja um Revendedor Exclusivo <strong style="color: #fd7b16;"><br>Pronto Light na sua cidade</strong></h1>
	<br class="hide-in-mobile"/>
	<br class="hide-in-mobile"/>
	<div class="div-row">
		<div class="div-col-50">
			<div style="padding:20px;">
				<img src="https://site.prontolight.com/wp-content/uploads/2021/08/captura-de-tela-2017-02-03-as-10-45-54.png" width="100%" />
			</div>
		</div>		
		<div class="div-col-50">
			<div style="padding:20px;">
				<h2 style="margin-bottom: 5px;     text-transform: capitalize; color: #fd7b16;">Marca</h2>

				<ul style="margin-left: 20px;">
					
					<li>Marca pioneira e consolidada (14 anos de mercado)</li>			
				<li>Reconhecida e aprovada por nutricionistas</li>			
				<li>Cardápio Saudável</li>			
				<li>Produtos, Low Carb, Detox, Sem Glúten, Fitness, Veganos e Vegetarianos  </li>

				</ul>

				
				<br />
				<h2 style="margin-bottom: 5px;     text-transform: capitalize; color: #fd7b16;">Vantagens</h2>			
				<ul style="margin-left: 20px;"><li>Baixo investimento com alta lucratividade</li>			
				<li>Retorno a curto prazo</li>			
				<li>Treinamento</li>			
				<li>Canal exclusivo de vendas</li>	</ul>		
			</div>
		</div>		
	</div>

	<br class="hide-in-mobile"/>
	<br class="hide-in-mobile"/>
	<br class="hide-in-mobile"/>
	<br class="hide-in-mobile"/>

	<div class="div-row">
		<div class="div-col-50">
			<div style="padding:20px;">
				<h2 style="margin-bottom: 5px;     text-transform: capitalize; color: #fd7b16;">Mercado</h2>
				<ul style="margin-left: 20px;">
				<li>Saúde e bem estar são tendências de consumo</li>			
				<li>A busca por alimentação saudável é uma constante crescente</li>			
				<li>Mais de 7 milhões de pessoas moram sozinhas e buscam praticidade na sua alimentação </li>			
				<li>No brasil, 61% dos compradores optam por consumir pratos prontos e/ou congelados</li>
				<li>34% dos consumidores brasileiros dispõem de pouco tempo porque levam uma vida corrida</li>
				</ul>	
			</div>
		</div>		
		<div class="div-col-50">
			<div style="padding:20px;">
				<img src="/wp-content/uploads/2021/05/IMG_1724.jpg" width="100%" />
			</div>
		</div>		
	</div>

</div>


<div class="div-content" style="max-width:800px;">
	<div class="div-form">
		<h2>É nesse mercado gigantesco que a <br class="hide-in-mobile"/><strong>Pronto Light atua</strong></h2>
		<p>Preencha o formulário, entraremos em contato!</p>
		<div style="max-width: 400px; margin:0 auto;"><?php echo do_shortcode('[contact-form-7 id="12679" title="Formulario revendedores"]')?></div>
	</div>		
</div>




<?php

get_footer();

?>