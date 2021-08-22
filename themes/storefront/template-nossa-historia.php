<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Nossa Historia
 *
 * @package storefront
 */

get_header(); ?>

  <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/banner-sobre.png">

  <br>

  <h1 class="content-featured-product__main-title text-orange">Sobre a Pronto Light</h1>

  <h4 class="title-orange">Assim Nasceu a Pronto Light - Um novo conceito em alimentação:</h4>

  <p class="doc-text doc-text--italic">
    Assim Nasceu a Pronto Light - Um novo conceito em alimentação: Tudo começou quando Eduardo Dimand, fundador da empresa, começou a praticar fisiculturismo por esporte. Seu objetivo era perder peso e ganhar massa muscular. Conversando com especialistas, aprendeu que a fórmula para os RESULTADOS é: ALIMENTAÇÃO CORRETA, treino e descanso, e entendeu que a alimentação é o grande divisor de águas. 
  </p>

  <p class="doc-text doc-text--italic">
    Treinar e descansar, tudo bem, só dependia dele, mas uma alimentação individualizada na mesa, nos horários certos... bem, aí surgiu o problema. 
  </p>

  <div class="history-depoiment">
    <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/img-history.png">
    <div class="history-depoiment__text">
      <p class="doc-text doc-text--italic">
        "Eu precisava de alimentos preparados de forma light, com porções adequadas para o meu objetivo. Na falta de opção, comecei a preparar. Faltou tempo. Procurei, e não encontrei. Sabia que outras pessoas gostariam de mudar seus hábitos alimentares, mas não sabiam como e não tinham tempo, como eu”. 
      </p>

      <p class="doc-text">
        Eduardo Dimand
      </p>
    </div>
  </div>

  <p class="doc-text doc-text--italic">
    A idéia de criar uma empresa que funcionasse como uma “farmácia de manipulação” de alimentos começou a fazer parte do seu pensamento diário. “Existem muitas pessoas interessadas em perder peso e ganhar qualidade de vida." E para alcançar esse objetivo, a forma mais eficiente é adotar uma alimentação saudável. Para passar da teoria à prática, essas pessoas precisam, a partir da orientação dada por um nutricionista ou médico, receber em casa ou no trabalho, suas refeições devidamente equilibradas, personalizadas e prontas. PRONTO! Nasceu o nome. 
  </p>

  <p class="doc-text doc-text--italic">
     Depois de 3 anos de piloto, desenvolvendo produtos, embalagens e conceito na própria cozinha de sua casa, estava na hora de expandir, pois já não era possível atender a demanda. “Senti que sozinho, não conseguiria realizar meu sonho” – confessou Edu.
  </p>

  <h4 class="title-orange">Chegou Fernando Negrão, Educador Físico e amigo.</h4>

  <div class="history-depoiment">
    <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/img-history.png">
    <div class="history-depoiment__text">
      <p class="doc-text doc-text--italic">
        “Minha experiência como educador físico fez com que eu aprendesse a importância da alimentação quando se busca obter resultados físicos e estéticos”. Aliada a prática de exercício físico, compõe uma fórmula perfeita que resulta em auto confiança e bem estar." 
      </p>

      <p class="doc-text">
        Fernando Negrão
      </p>
    </div>
  </div>

  <h4 class="title-orange">Para completar o time dos sócios e formalizar o negócio veio Pedro, administrador, amigo e cliente.</h4>
  
  <div class="history-depoiment">
    <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/img-history.png">
    <div class="history-depoiment__text">
      <p class="doc-text doc-text--italic">
        “Acredito muito na frase: você é o que você come. Os benefícios e resultados de uma boa alimentação são impressionantes. Poder proporcionar isso à outras pessoas e saber de seus resultados, é definitivamente uma enorme satisfação. E fazer do meu estilo de vida, um negócio, é um sonho!” 
      </p>

      <p class="doc-text">
        Pedro Pandolpho
      </p>
    </div>
  </div>

  <br>
  
<?php
get_footer();
