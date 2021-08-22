<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Parceiros
 *
 * @package storefront
 */

get_header(); ?>

<h1 class="content-featured-product__main-title text-orange">Parceiros</h1>

<ul class="accordion">
	<li>
		<a class="accordion-title">Assessoria Esportiva</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-metasnovo53ceca2d7ee54.jpg" alt="Metas Sport">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">Metas Sport</h3>
            <span class="partners__phone">(11) 3849-1967 / (11) 7814-7532</span>
            <span class="partners__mail">metas@metasesporte.com.br</span>
            <a href="http://www.metasesporte.com.br" 
              target="_blank" 
              class="partners__link">
              www.metasesporte.com.br
            </a>

            <a href="mailto:metas@metasesporte.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logorunefun53cecadab5b0c.gif" alt="Run & Fun">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">Run & Fun</h3>
            <span class="partners__phone">(11) 5096-4746</span>
            <span class="partners__mail">runefun@runefun.com.br</span>
            <a href="http://www.runefun.com.br" 
              target="_blank" 
              class="partners__link">
              www.runefun.com.br
            </a>

            <a href="mailto:runefun@runefun.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/535af3a8db179.jpg" alt="MEDLEY TRIATHLON ASSESSORIA ESPORTIVA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">MEDLEY TRIATHLON ASSESSORIA ESPORTIVA</h3>
            <span class="partners__phone">(11) 5631-2191 / (11) 9579-3406</span>
            <a href="http://medleytriathlon.com.br/" 
              target="_blank" 
              class="partners__link">
              www.medleytriathlon.com.br
            </a>

            <a href="http://medleytriathlon.com.br/" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/gravidezativa53cecc66981a9.jpg" alt="Metas Sport">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">GRAVIDEZ ATIVA</h3>
            <span class="partners__phone">(11) 8274 4224</span>
            <span class="partners__mail">contato@gravidezativa.com.br</span>
            <a href="http://www.gravidezativa.com.br/" 
              target="_blank" 
              class="partners__link">
              www.gravidezativa.com.br/
            </a>

            <a href="mailto:contato@gravidezativa.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo4any1200953ceccf233fd3.gif" alt="4ANY1">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">4ANY1</h3>
            <span class="partners__phone">(11) 3885-8069</span>
            <span class="partners__mail">4any1@4any1.com.br</span>
            <a href="http://www.4any1.com.br" 
              target="_blank" 
              class="partners__link">
              www.4any1.com.br
            </a>

            <a href="mailto:4any1@4any1.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/tpm-grde53cecd4bd336b.jpg" alt="TPM -TREINAMENTO PARA MULHERES">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">TPM -TREINAMENTO PARA MULHERES</h3>
            <span class="partners__phone">(11) 9229.5839</span>
            <span class="partners__mail">adri@treinamentoparamulheres.com.br</span>
            <a href="http://www.treinamentoparamulheres.com.br" 
              target="_blank" 
              class="partners__link">
              www.treinamentoparamulheres.com.br
            </a>

            <a href="mailto:adri@treinamentoparamulheres.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-personal-life53cecdaa5fe9e.jpg" alt="PERSONAL LIFE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PERSONAL LIFE</h3>
            <span class="partners__phone">(11) 3045-0609</span>
            <span class="partners__mail">falecom@personallife.com.br</span>
            <a href="http://www.personallife.com.br" 
              target="_blank" 
              class="partners__link">
              www.personallife.com.br
            </a>

            <a href="mailto:falecom@personallife.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logoatitudebemestar53cecdfc4ef0e.gif" alt="+ATITUDE +BEM ESTAR">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">+ATITUDE +BEM ESTAR</h3>
            <span class="partners__phone">(11) 7142-8518</span>
            <span class="partners__mail">sandrasantos@sfrsports.com.br</span>
            <a href="http://www.sfrsports.com.br" 
              target="_blank" 
              class="partners__link">
              www.sfrsports.com.br
            </a>

            <a href="mailto:sandrasantos@sfrsports.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <!-- <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-personal-life53cecdaa5fe9e.jpg" alt="">
          </div> -->
          <div class="wrapper-partners__info">
            <h3 class="partners__title">D"ELIA SPORTS CONSULTING</h3>
            <span class="partners__phone">(11) 5052-4947</span>
            <span class="partners__mail">alessandra@deliasports.com.br</span>
            <a href="http://www.deliasports.com.br" 
              target="_blank" 
              class="partners__link">
              www.deliasports.com.br
            </a>

            <a href="mailto:alessandra@deliasports.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/quark53cece9f6dd39.gif" alt="QUARK SAÚDE E PERFORMANCE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">QUARK SAÚDE E PERFORMANCE</h3>
            <span class="partners__phone">(11) 3431-4339</span>
            <span class="partners__mail">contato@quark.esp.br</span>
            <a href="https://site1.quarksports.com.br/quark" 
              target="_blank" 
              class="partners__link">
              site1.quarksports.com.br/quark
            </a>

            <a href="mailto:contato@quark.esp.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-smachado-redimensionadobmp53cecef1d51b1.jpg" alt="SIMONE MACHADO ASSESSORIA ESPORTIVA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">SIMONE MACHADO ASSESSORIA ESPORTIVA</h3>
            <span class="partners__phone">(11) 5565-1675</span>
            <span class="partners__mail">sm@smassessoriaesportiva.com.br</span>
            <a href="http://www.smassessoriaesportiva.com.br" 
              target="_blank" 
              class="partners__link">
              www.smassessoriaesportiva.com.br
            </a>

            <a href="mailto:sm@smassessoriaesportiva.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <!-- <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-smachado-redimensionadobmp53cecef1d51b1.jpg" alt="DYNAFIT ASSESSORIA ESPORTIVA">
          </div> -->
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DYNAFIT ASSESSORIA ESPORTIVA - "CORRA CONOSCO NO ABC"</h3>
            <span class="partners__phone">(11) 2848-4040</span>
            <span class="partners__mail">contato@dynafit.com.br</span>
            <a href="http://dynafit.com.br" 
              target="_blank" 
              class="partners__link">
              www.dynafit.com.br
            </a>

            <a href="mailto:contato@dynafit.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/ecos53cecf600bc72.jpg" alt="ECOS - EDUCAÇÃO CORPORAL E SAÚDE">
          </div>

          <div class="wrapper-partners__info">
            <h3 class="partners__title">ECOS - EDUCAÇÃO CORPORAL E SAÚDE</h3>
            <span class="partners__phone">(11) 2649-1062 / (11) 2649-1063</span>
            <a href="https://coachdesaude.com.br" 
              target="_blank" 
              class="partners__link">
              www.coachdesaude.com.br
            </a>

            <a href="https://coachdesaude.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
  
	<li>
		<a class="accordion-title">Clínicas</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-h4l53cff3b58770c.jpg" alt="CLÍNICA HEALTH 4 LIFE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CLÍNICA HEALTH 4 LIFE</h3>
            <span class="partners__phone">(11) 3887-2735 / (11) 3887-9587</span>
            <a href="http://www.health4life.com.br" 
              target="_blank" 
              class="partners__link">
              www.health4life.com.br
            </a>

            <a href="www.health4life.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-bpf253cffc1ceb0aa.jpg" alt="BODY PREGNANCY FITNESS">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">BODY PREGNANCY FITNESS</h3>
            <span class="partners__phone">(11) 2368-5034</span>
            <a href="http://www.bpfit.com.br" 
              target="_blank" 
              class="partners__link">
              www.bpfit.com.br
            </a>

            <a href="mailto:runefun@runefun.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-luiza-sato53cffde219139.jpg" alt="LUIZA SATO - PERDIZES">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">LUIZA SATO - PERDIZES</h3>
            <span class="partners__phone">(11) 3672-4464 / (11) 3672-8704</span>
            <span class="partners__mail">luizasatoperdizes@gmail.com</span>
            <a href="http://www.luizasato.com.br" 
              target="_blank" 
              class="partners__link">
              www.luizasato.com.br
            </a>

            <a href="mailto:luizasatoperdizes@gmail.com" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/centrodedrenagem53cffc891734a.jpg" alt="CENTRO DE DRENAGEM">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CENTRO DE DRENAGEM</h3>
            <span class="partners__phone">(11) 3168-4862 / (11) 3079-9674</span>
            <a href="http://www.centrodedrenagem.com.br" 
              target="_blank" 
              class="partners__link">
              www.centrodedrenagem.com.br
            </a>

            <a href="http://www.centrodedrenagem.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/d1up53cffd313cf3e.jpg" alt="CLÍNICA D1UP MEDICINA /ESTÉTICA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CLÍNICA D1UP MEDICINA /ESTÉTICA</h3>
            <span class="partners__phone">(11) 5181-1362 / (11) 7892-4732</span>
            <!-- <span class="partners__mail"></span> -->
            <a href="http://www.d1up.com.br" 
              target="_blank" 
              class="partners__link">
              www.d1up.com.br
            </a>

            <a href="www.d1up.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logpilatesmaniabmp53cffd734fb90.jpg" alt="PILATES MANIA - AULAS DE PILATES EM STUDIO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PILATES MANIA - AULAS DE PILATES EM STUDIO</h3>
            <span class="partners__phone">(11) 5182-9135 / 80*15236</span>
            <span class="partners__mail">contato@pilatesmania.com.br</span>
            <a href="http://www.pilatesmania.com.br"
              target="_blank"
              class="partners__link">
              www.pilatesmania.com.br
            </a>

            <a href="mailto:contato@pilatesmania.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/healthclub53cffdb2eda07.jpg" alt="CLÍNICA HEALTH CLUBE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CLÍNICA HEALTH CLUBE</h3>
            <span class="partners__phone">(11) 3758-304</span>
            <a href="http://www.healthclube.com.br"
              target="_blank"
              class="partners__link">
              www.healthclube.com.br
            </a>

            <a href="http://www.healthclube.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
  
	<li>
		<a class="accordion-title">Nutricionistas</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="JOYCE GOUVEIA NUNES DA SILVA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">JOYCE GOUVEIA NUNES DA SILVA</h3>
            <span class="partners__phone">(11) 3675-0130</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <!-- <a href="http://www.luizasato.com.br" 
              target="_blank" 
              class="partners__link">
              www.luizasato.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/coloridacmykvertical53d7fc3597c19.jpg" alt="ALINE LAMARCO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ALINE LAMARCO</h3>
            <span class="partners__phone">4195-4500 / 98184-0000</span>
            <a href="http://www.qualinutri.com.br" 
              target="_blank" 
              class="partners__link">
              www.qualinutri.com.br
            </a>

            <a href="http://www.qualinutri.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/lucia-gamarano2353d7fc9ed2e01.jpg" alt="DRA. LUCIA GAMARANO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. LUCIA GAMARANO</h3>
            <span class="partners__phone">(11) 95997-9064 / (11) 4226-7887 / (11) 4226-4888</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <!-- <a href="http://www.luizasato.com.br" 
              target="_blank" 
              class="partners__link">
              www.luizasato.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logomarcojafetcolr53d7fd29e2fad.jpg" alt="MARCO F. JAFET">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">MARCO F. JAFET</h3>
            <span class="partners__phone">(11) 3849-0592 / (11)3849-8512</span>
            <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span>
            <a href="http://www.jafetnutricao.com.br" 
              target="_blank" 
              class="partners__link">
              www.jafetnutricao.com.br
            </a>

            <a href="http://www.jafetnutricao.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nuttri-a53d7fd8872422.jpg" alt="NUTTRI A - NUTRIÇÃO PARA O BEM ESTAR">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTTRI A - NUTRIÇÃO PARA O BEM ESTAR</h3>
            <span class="partners__phone">(11) 3637-0731 / (11) 8564-7976</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <a href="http://www.nuttria.com.br" 
              target="_blank" 
              class="partners__link">
              www.nuttria.com.br
            </a>

            <a href="http://www.nuttria.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/suzuki53d7fdbb5823a.jpg" alt="VANESSA SUZUKI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">VANESSA SUZUKI</h3>
            <span class="partners__phone">(11) 5093-3164 / (11) 5093-3168</span>
            <a href="http://www.vanessasuzuki.com.br" 
              target="_blank" 
              class="partners__link">
              www.vanessasuzuki.com.br
            </a>

            <a href="http://www.vanessasuzuki.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/sergiorosa53d7fe1e790f0.jpg" alt="DR. SÉRGIO ROSA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DR. SÉRGIO ROSA</h3>
            <span class="partners__phone">(11) 9402-9489</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <a href="http://www.luizasato.com.br" 
              target="_blank" 
              class="partners__link">
              www.luizasato.com.br
            </a>

            <a href="http://www.luizasato.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nandi53d7fe8231145.jpg" alt="ANA PAULA FERREIRA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ANA PAULA FERREIRA</h3>
            <span class="partners__phone">(11) 8673-0840</span>
            <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span>
            <a href="http://www.minhanutricionista.ntr.br" 
              target="_blank" 
              class="partners__link">
              www.minhanutricionista.ntr.br
            </a>

            <a href="http://www.minhanutricionista.ntr.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nutrigourmethomepng53d7feae1fa92.png" alt="DRA. DANIELLE LOPES RUSSO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. DANIELLE LOPES RUSSO</h3>
            <!-- <span class="partners__phone">(11) 9402-9489</span> -->
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <a href="http://www.nutrigourmethome.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutrigourmethome.com.br
            </a>

            <a href="http://www.nutrigourmethome.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="ERIKA ALMEIDA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ERIKA ALMEIDA</h3>
            <span class="partners__phone">(11) 98568-0152 / (11) 5084-1641</span>
            <a href="http://www.vitalenutri.com.br" 
              target="_blank" 
              class="partners__link">
              www.vitalenutri.com.br
            </a>

            <a href="http://www.vitalenutri.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/serena53d7ff0678c67.jpg" alt="SERENA DEL FAVERO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">SERENA DEL FAVERO</h3>
            <span class="partners__phone">(11) 23094590 / (11) 82776627</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <a href="https://www.serenadelfavero.com.br" 
              target="_blank" 
              class="partners__link">
              www.serenadelfavero.com.br
            </a>

            <a href="http://www.serenadelfavero.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nutricao-e-acupunturapng54174f5b21b8b.png" alt="LAÍS SASSAKI FURINE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">LAÍS SASSAKI FURINE</h3>
            <span class="partners__phone">(11) 3868-4532 / (11) 8209-8230</span>
            <!-- <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span> -->
            <a href="http://www.saktisaude.com.br" 
              target="_blank" 
              class="partners__link">
              www.saktisaude.com.br
            </a>

            <a href="http://www.saktisaude.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="DRA. CAROLINA BACCEI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. CAROLINA BACCEI</h3>
            <span class="partners__phone">7337-2955</span>
            <!-- <span class="partners__mail">luizasatoperdizes@gmail.com</span> -->
            <a href="http://nutrireterapia.blogspot.com"
              target="_blank"
              class="partners__link">
              nutrireterapia.blogspot.com
            </a>

            <a href="http://nutrireterapia.blogspot.com"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/lifebmp53d7ffb450aac.jpg" alt="FABÍOLA ESTELA DOMINGUES">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FABÍOLA ESTELA DOMINGUES</h3>
            <span class="partners__phone">(11) 3288-8836</span>
            <span class="partners__mail">atendimento@fabiolanutri.com.br</span>
            <a href="http://www.fabiolanutri.com.br" 
              target="_blank" 
              class="partners__link">
              www.fabiolanutri.com.br
            </a>

            <a href="http://www.fabiolanutri.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/carol1605537fc9a3bedc.jpg" alt="DRA. CAROL PEDROSA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. CAROL PEDROSA</h3>
            <span class="partners__phone">(11)3078-5881 / (11)99446-1340</span>
            <span class="partners__mail">carol@dracarolpedrosa.com.br</span>
            <a href="http://www.dracarolpedrosa.com.br" 
              target="_blank" 
              class="partners__link">
              www.dracarolpedrosa.com.br
            </a>

            <a href="http://www.dracarolpedrosa.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="FERNANDA STOCCO NICOLAU">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FERNANDA STOCCO NICOLAU</h3>
            <span class="partners__phone">(11) 32847681</span>
            <!-- <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span> -->
            <!-- <a href="http://www.saktisaude.com.br" 
              target="_blank" 
              class="partners__link">
              www.saktisaude.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
           
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-1-flavia-araujo-consultoria-nutricional-253d8005745d81.jpg" alt="FLAVIA ARAUJO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FLAVIA ARAUJO</h3>
            <span class="partners__phone">(11) 3749-0312</span>
            <!-- <span class="partners__mail">carol@dracarolpedrosa.com.br</span> -->
            <!-- <a href="http://www.dracarolpedrosa.com.br" 
              target="_blank" 
              class="partners__link">
              www.dracarolpedrosa.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/rglogo53d80094baebc.gif" alt="RG NUTRI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">RG NUTRI</h3>
            <span class="partners__phone">(11) 3044-4047 / (11) 3045-0610</span>
            <!-- <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span> -->
            <a href="http://www.rgnutri.com.br" 
              target="_blank" 
              class="partners__link">
              www.rgnutri.com.br
            </a>

            <a href="http://www.rgnutri.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/bertoluccipng53d800ce829cc.png" alt="PATRÍCIA BERTOLUCCI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PATRÍCIA BERTOLUCCI</h3>
            <span class="partners__phone">§911) 3044-0422 / (11) 3845-6549</span>
            <!-- <span class="partners__mail">carol@dracarolpedrosa.com.br</span> -->
            <!-- <a href="http://www.dracarolpedrosa.com.br" 
              target="_blank" 
              class="partners__link">
              www.dracarolpedrosa.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nutri4lifemenor53d80116dff8c.jpg" alt="NUTRI4LIFE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTRI4LIFE</h3>
            <span class="partners__phone">(11) 2613-1991 / (11) 8366-2866</span>
            <span class="partners__mail">contato@nutri4life.com.br</span>
            <a href="https://www.nutri4life.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutri4life.com.br
            </a>

            <a href="mailto:contato@nutri4life.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-jpeg53d8015cd0a57.jpg" alt="NUTRICIUS - NUTRIÇÃO E METABOLISMO NO ESPORTE E NA QUALIDADE DE VIDA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTRICIUS - NUTRIÇÃO E METABOLISMO NO ESPORTE E NA QUALIDADE DE VIDA</h3>
            <span class="partners__phone">(11) 3842-9431 / (11) 3846-7187</span>
            <!-- <span class="partners__mail">carol@dracarolpedrosa.com.br</span> -->
            <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a>

            <a href="http://www.nutricius.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/fgh-logo53d801a614332.jpg" alt="FGH CONSULTORIA NUTRICIONAL">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FGH CONSULTORIA NUTRICIONAL</h3>
            <span class="partners__phone">(11) 3253-6649</span>
            <!-- <span class="partners__phone">DESC. 10% (Clientes Pronto Light)</span> -->
            <a href="http://www.fghnutricional.com" 
              target="_blank" 
              class="partners__link">
              www.fghnutricional.com
            </a>

            <a href="http://www.fghnutricional.com" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/coloridacmykvertical-153d802a02e856.jpg" alt="NUTRICIUS - NUTRIÇÃO E METABOLISMO NO ESPORTE E NA QUALIDADE DE VIDA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ANDREZZA BOTELHO</h3>
            <span class="partners__phone">(11) 5082-1598</span>
            <span class="partners__mail">atendimento@andrezzabotelho.com.br</span>
            <a href="http://www.andrezzabotelho.com.br" 
              target="_blank" 
              class="partners__link">
              www.andrezzabotelho.com.br/
            </a>

            <a href="mailto:atendimento@andrezzabotelho.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/claudiatalan53d802cd386f5.gif" alt="CLAUDIA TALAN MARIN">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CLAUDIA TALAN MARIN</h3>
            <span class="partners__phone">(11) 4506-6520 / (11) 9251-1036</span>
            <!-- <a href="http://www.fghnutricional.com" 
              target="_blank" 
              class="partners__link">
              www.fghnutricional.com
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logoanalua53d802ff2d27c.jpg" alt="ANA LUA NEGRELI - CONTROLE DE PESO E ESPORTE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ANA LUA NEGRELI - CONTROLE DE PESO E ESPORTE</h3>
            <span class="partners__phone">(11) 91414295 / (11) 5533-9010</span>
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/essencial53d80329b8830.jpg" alt="NUTRIESSENCIAL">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTRIESSENCIAL</h3>
            <span class="partners__phone">(11) 3582-1312</span>
            <!-- <a href="http://www.fghnutricional.com" 
              target="_blank" 
              class="partners__link">
              www.fghnutricional.com
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/daicavalcanti53d8036276226.gif" alt="DAI CAVALCANTI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DAI CAVALCANTI</h3>
            <span class="partners__phone">(11) 8390-6915</span>
            <span class="partners__mail">d.nutri@hotmail.com</span>
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:d.nutri@hotmail.com" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/fefurman53d80381e4fb6.jpg" alt="FERNANDA FURMANKIEWICZ">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FERNANDA FURMANKIEWICZ</h3>
            <span class="partners__phone">(11) 9154.3675</span>
            <!-- <a href="http://www.fghnutricional.com"
              target="_blank"
              class="partners__link">
              www.fghnutricional.com
            </a> -->

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logopng53d803c57b409.png" alt="NUTRIÇÃO GLOBAL">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTRIÇÃO GLOBAL</h3>
            <span class="partners__phone">(11) 8187-5306</span>
            <span class="partners__mail">contato@nutricaoglobal.com.br</span>
            <a href="http://www.nutricaoglobal.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricaoglobal.com.br
            </a>

            <a href="mailto:contato@nutricaoglobal.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nutriplenabmp53d803f7c5a69.jpg" alt="NUTRIPLENA - ESPECIALISTA EM NUTRIÇÃO CLÍNICA EM DOENÇAS CRÔNICAS NÃO TRANSMISSÍVEIS">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NUTRIPLENA - ESPECIALISTA EM NUTRIÇÃO CLÍNICA EM DOENÇAS CRÔNICAS NÃO TRANSMISSÍVEIS</h3>
            <span class="partners__phone">(11) 8136-8888</span>
            <a href="http://www.nutriplena.com.br"
              target="_blank"
              class="partners__link">
              www.nutriplena.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
            
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/thaisschiavo53d804265ee8c.jpg" alt="THAIS SCHIAVO REIS">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">THAIS SCHIAVO REIS</h3>
            <span class="partners__phone">(11) 8297-5050 / (11) 5523-3591</span>
            <a href="http://www.thaisreis.com.br" 
              target="_blank" 
              class="partners__link">
              www.thaisreis.com.br
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logoclinicaesportivabmp53d8047e0b888.jpg" alt="CLÍNICA ESPORTIVA - NUTRIÇÃO E PERSONAL TRAINER">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CLÍNICA ESPORTIVA - NUTRIÇÃO E PERSONAL TRAINER</h3>
            <span class="partners__phone">(11) 3666-4620</span>
            <a href="http://www.clinicaesportiva.com.br"
              target="_blank"
              class="partners__link">
              www.clinicaesportiva.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/dnanutri53d804ab3be5e.jpg" alt="DNA NUTRI - ELAINE CRISTINA R. DE PÁDUA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DNA NUTRI - ELAINE CRISTINA R. DE PÁDUA</h3>
            <span class="partners__phone">(11) 2188-3737 / (11) 2188-3700</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logoprisciladicieropng53d804ec2da2f.png" alt="PRISCILA DI CIERO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PRISCILA DI CIERO</h3>
            <span class="partners__phone">(11) 9788-8134</span>
            <a href="http://prisciladiciero.com.br"
              target="_blank"
              class="partners__link">
              www.prisciladiciero.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/erikaalvarengalogo53d80516be9e7.jpg" alt="DNA NUTRI - ELAINE CRISTINA R. DE PÁDUA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ERIKA ALVARENGA</h3>
            <span class="partners__phone">(11) 9224-3247</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="https://twitter.com/nutrianalise" 
              target="_blank" 
              class="partners__link">
              twitter.com/nutrianalise
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/julianamuradpng53d8057fdb44d.png" alt="PRISCILA DI CIERO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">JULIANA MURAD</h3>
            <span class="partners__phone">(11) 3862-5081 / (11) 8334-5764</span>
            <a href="http://www.comersemculpa.com.br"
              target="_blank"
              class="partners__link">
              www.comersemculpa.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/islaine53d805acb4250.jpg" alt="DRA. ISLAINE SBÍZERO DE GIOVANI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. ISLAINE SBÍZERO DE GIOVANI</h3>
            <span class="partners__phone">(11) 2783-5821</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="BARBARA RESCALLI SANCHES">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">BARBARA RESCALLI SANCHES</h3>
            <span class="partners__phone">(11)9204-7442 / (11) 4437-1818</span>
            <a href="http://nutricionistabarbara.site.com.br"
              target="_blank"
              class="partners__link">
              www.nutricionistabarbara.site.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/rojasssbmp53d8060968cb5.jpg" alt="MARÍLIA BIASETTO ROJAS">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">MARÍLIA BIASETTO ROJAS</h3>
            <span class="partners__phone">(11) 9695-9292 / (11) 8438-8804</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="RAQUEL PEGORARO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">RAQUEL PEGORARO</h3>
            <span class="partners__phone">(11) 3852-5031 / (11) 99997-8697 / (11) 95239-3171</span>
            <!-- <a href="http://prisciladiciero.com.br"
              target="_blank"
              class="partners__link">
              www.prisciladiciero.com.br
            </a> -->

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/ccnutri53d80686bc538.jpg" alt="DRA. CAROLINE CUNHA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DRA. CAROLINE CUNHA</h3>
            <span class="partners__phone">(11) 96684-8419 / (11) 99188-7645</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="http://www.ccnutri.com" 
              target="_blank" 
              class="partners__link">
              www.ccnutri.com
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="DANIELA MAZUCO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DANIELA MAZUCO</h3>
            <span class="partners__phone">(11) 99955-4569</span>
            <a href="http://www.dmnutricao.com.br"
              target="_blank"
              class="partners__link">
              www.dmnutricao.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/joaquimgravapng53d806dd5c484.png" alt="MEDICINA ESPORTIVA JOAQUIM GRAVA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">MEDICINA ESPORTIVA JOAQUIM GRAVA</h3>
            <span class="partners__phone">(11) 38854717</span>
            <a href="http://www.joaquimgrava.com.br"
              target="_blank"
              class="partners__link">
              www.joaquimgrava.com.br/
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logobalido53d80709c9055.jpg" alt="MARCELLO BALIDO AMADO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">MARCELLO BALIDO AMADO</h3>
            <span class="partners__phone">(11) 7914-9418</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/consultas-contato54bd6f74d073d.jpg" alt="DR. GIOVANNA MAURO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DR. GIOVANNA MAURO</h3>
            <span class="partners__phone">(11) 98461-0830</span>
            <span class="partners__mail">giovanna.mauro@gmail.com</span>
            <!-- <a href="http://prisciladiciero.com.br"
              target="_blank"
              class="partners__link">
              www.prisciladiciero.com.br
            </a> -->

            <a href="mailto:giovanna.mauro@gmail.com"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/alimentacaoideal54d0e775dbf44.jpg" alt="DANILO HESSEL SANCHES DO PRADOO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DANILO HESSEL SANCHES DO PRADO</h3>
            <!-- <span class="partners__phone">(11) 98461-0830</span> -->
            <span class="partners__mail">nutridp@hotmail.com</span>
            <a href="http://www.alimentacaoideal.com"
              target="_blank"
              class="partners__link">
              www.alimentacaoideal.com
            </a>

            <a href="mailto:nutridp@hotmail.com"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
    
	<li>
		<a class="accordion-title">Personal Trainer</a>

    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/ruyamadei53d91e57459e3.jpg" alt="RUY AMADEI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">RUY AMADEI</h3>
            <span class="partners__phone">(11) 9955-7068</span>
            <a href="http://www.ruyamadei.com.br"
              target="_blank"
              class="partners__link">
              www.ruyamadei.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/pedrojordano53d91e75b3755.jpg" alt="PEDRO JORDANO - PERSONAL">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PEDRO JORDANO - PERSONAL</h3>
            <span class="partners__phone">(11) 7724-6173</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/ecos53d91ed2df96a.jpg" alt="ECOS - EDUCAÇÃO CORPORAL E SAÚDE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ECOS - EDUCAÇÃO CORPORAL E SAÚDE</h3>
            <span class="partners__phone">(11) 2649-1062 / (11) 2649-1063</span>
            <a href="http://www.ecos-ecos.com.br"
              target="_blank"
              class="partners__link">
              www.ecos-ecos.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/pattymezzardi53d91f147c4f6.jpg" alt="PATTY MEZADRI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PATTY MEZADRI</h3>
            <span class="partners__phone">(11) 8044-2379</span>
            <span class="partners__mail">patty_mezadri@hotmail.com</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.nutricius.com.br" 
              target="_blank" 
              class="partners__link">
              www.nutricius.com.br
            </a> -->

            <a href="mailto:patty_mezadri@hotmail.com" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/nazagalvao53d91f67c2b07.jpg" alt="NAZA GALVÃO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">NAZA GALVÃO</h3>
            <span class="partners__phone">(11) 9237-0876 / (11) 8044-2378</span>
            <span class="partners__mail">nazagalvao@terra.com.br</span>
            <!-- <a href="http://www.joaquimgrava.com.br"
              target="_blank"
              class="partners__link">
              www.joaquimgrava.com.br/
            </a> -->

            <a href="mailto:nazagalvao@terra.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/ulissesmesquita53d91f950f2ca.jpg" alt="ULISSES MESQUITA">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ULISSES MESQUITA</h3>
            <span class="partners__phone">contato@ulissesmesquita.com.br</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="http://www.ulissesmesquita.com.br" 
              target="_blank" 
              class="partners__link">
              www.ulissesmesquita.com.br
            </a>

            <a href="mailto:contato@ulissesmesquita.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
            
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/fejaqueti53d91fd2bbc3f.jpg" alt="FELIPE CHAMI JAQUETTI">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FELIPE CHAMI JAQUETTI</h3>
            <span class="partners__phone">(11) 7385-5065</span>
            <!-- <a href="http://www.joaquimgrava.com.br"
              target="_blank"
              class="partners__link">
              www.joaquimgrava.com.br/
            </a> -->

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-healthy-solutions53d91ffcb8be0.jpg" alt="DANIEL ALARCON">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">DANIEL ALARCON</h3>
            <a href="http://www.danielalarcon.com.br" 
              target="_blank" 
              class="partners__link">
              www.danielalarcon.com.br
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
            
      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/loguinho53d7fbd189049.jpg" alt="NAZA GALVÃO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">EDUARDO QUEIROZ</h3>
            <span class="partners__phone">(11) 8376-9160</span>
            <a href="http://www.eduardoqueiroz.com.br"
              target="_blank"
              class="partners__link">
              www.eduardoqueiroz.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/fabiana53d9206a1e8cb.jpg" alt="HEALTH & FITNESS (FABIANA FONTANA)">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">HEALTH & FITNESS (FABIANA FONTANA)</h3>
            <span class="partners__phone">(11) 8125-2682</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <!-- <a href="http://www.ulissesmesquita.com.br" 
              target="_blank" 
              class="partners__link">
              www.ulissesmesquita.com.br
            </a> -->

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
  
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-gui-seco53d920d1adb26.jpg" alt="PERSONAL STUDIO 5 HOME (PERSONAL EM CASA)">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PERSONAL STUDIO 5 HOME (PERSONAL EM CASA)</h3>
            <span class="partners__phone">(11) 99739-5262</span>
            <!-- <span class="partners__mail">nazagalvao@terra.com.br</span> -->
            <a href="http://personalstudio5online.blogspot.com/"
              target="_blank"
              class="partners__link">
              personalstudio5online.blogspot.com
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/personalwellness53d92119ccb32.jpg" alt="ALICE AGUIAR">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ALICE AGUIAR</h3>
            <span class="partners__phone">(11) 98506-1616</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="http://personalwellness.com.br" 
              target="_blank" 
              class="partners__link">
              www.personalwellness.com.br
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
    
	<li>
		<a class="accordion-title">Academias</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-body53d9263e16803.jpg" alt="BODY STATION">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">BODY STATION</h3>
            <span class="partners__phone">(11) 3101-0145</span>
            <span class="partners__mail">contato@academiabodystation.com.br</span>
            <a href="http://www.academiabodystation.com.br"
              target="_blank"
              class="partners__link">
              www.academiabodystation.com.br
            </a>

            <a href="mailto:contato@academiabodystation.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-academia-k2-fp53d9268c6707f.jpg" alt="ACADEMIA K@2">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">ACADEMIA K@2</h3>
            <span class="partners__phone">(11) 2283-3600</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="https://academiak2.com.br" 
              target="_blank" 
              class="partners__link">
              www.academiak2.com.br
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-gui-seco53d920d1adb26.jpg" alt="PERSONAL STUDIO 5">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">PERSONAL STUDIO 5</h3>
            <span class="partners__phone">(11) 98447-1730 (Guilherme Zuim)</span>
            <a href="http://www.personalstudio5.com.br/"
              target="_blank"
              class="partners__link">
              www.personalstudio5.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </li>
    
	<li>
		<a class="accordion-title">Suplementos</a>
    <div class="wrapper-partners" style="display:none;">
    
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/botao-suplesport-final53d93005e51a2.jpg" alt="BODY STATION">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">SUPLESPORT SUPLEMENTOS</h3>
            <span class="partners__phone">(11) 2305-5055</span>
            <!-- <span class="partners__mail">contato@academiabodystation.com.br</span> -->
            <a href="http://www.suplesport.com.br"
              target="_blank"
              class="partners__link">
              www.suplesport.com.br
            </a>

            <a href="mailto:contato@academiabodystation.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-fundo-branco53d9302cc9a3e.jpg" alt="ACADEMIA K@2">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">SUPPLEMENT MEGA STORE</h3>
            <span class="partners__phone">(11) 3539-7700</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="http://www.supplementmegastore.com.br" 
              target="_blank" 
              class="partners__link">
              www.supplementmegastore.com.br
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
    
	<li>
		<a class="accordion-title">Coaching</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/claudiologo53d92f61e2d24.jpg" alt="CARB - DESENVOLVIMENTO HUMANO INTELIGENTE">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">CARB - DESENVOLVIMENTO HUMANO INTELIGENTE</h3>
            <span class="partners__phone">3885-0202 / 9772-8528</span>
            <span class="partners__mail">claudiobergamo@yahoo.com.br</span>
            <a href="http://claudiobergamo.blogspot.com"
              target="_blank"
              class="partners__link">
              www.claudiobergamo.blogspot.com
            </a>

            <a href="mailto:claudiobergamo@yahoo.com.br"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/coachjeanpng53d92fa6a370a.png" alt="JEAN PATRICK - COACH">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">JEAN PATRICK - COACH</h3>
            <span class="partners__phone">(11) 7754-0090 / (11) 8306-4346</span>
            <!-- <span class="partners__mail">d.nutri@hotmail.com</span> -->
            <a href="https://jeancoach.tumblr.com" 
              target="_blank" 
              class="partners__link">
              www.jeancoach.tumblr.com
            </a>

            <a href="mailto:" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
      
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/noiva53d92fc54ab03.jpg" alt="PERSONAL STUDIO 5">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FLÁVIA LOPES</h3>
            <span class="partners__phone">(11) 99485-1860</span>
            <a href="http://www.personalstudio5.com.br/"
              target="_blank"
              class="partners__link">
              www.denoivaamae.com
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>
    </div>
  </li>
    
	<li>
		<a class="accordion-title">Studio</a>
    <div class="wrapper-partners" style="display:none;">

      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/fitnesstogether53d92e4d9d7cf.jpg" alt="FITNESS TOGETHER">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">FITNESS TOGETHER</h3>
            <span class="partners__phone">(11) 5102-2649 / (11) 5102-2602</span>
            <!-- <span class="partners__mail">claudiobergamo@yahoo.com.br</span> -->
            <a href="http://claudiobergamo.blogspot.com"
              target="_blank"
              class="partners__link">
              www.claudiobergamo.blogspot.com
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>

        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/banzailogo55a816b8e918e.jpg" alt="BANZAI PILATES E PHYSIO">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">BANZAI PILATES E PHYSIO</h3>
            <span class="partners__phone">(11) 2384.0081 / 5641.2306</span>
            <span class="partners__mail">contatos@clinicabanzai.com.br</span>
            <a href="http://www.clinicabanzai.com.br" 
              target="_blank" 
              class="partners__link">
              www.clinicabanzai.com.br
            </a>

            <a href="mailto:contatos@clinicabanzai.com.br" 
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
      
	<li>
		<a class="accordion-title">Agência</a>
    <div class="wrapper-partners" style="display:none;">
    
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/gpalhares53d92e7306ca2.jpg" alt="G PALHARES">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">G PALHARES</h3>
            <span class="partners__phone">(11) 5093-7273</span>
            <!-- <span class="partners__mail">claudiobergamo@yahoo.com.br</span> -->
            <a href="http://www.gpalhares.com.br"
              target="_blank"
              class="partners__link">
              www.gpalhares.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
  </li>
  
	<li>
		<a class="accordion-title">Fornecedores</a>
    <div class="wrapper-partners" style="display:none;">
      
      <div class="wrapper-partners__row last">
        <div class="wrapper-partners__content">
          <div class="wrapper-partners__img">
            <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/logo-goldy53d92e9871f98.jpg" alt="GOLDY ALIMENTOS PREMIUM">
          </div>
          <div class="wrapper-partners__info">
            <h3 class="partners__title">GOLDY ALIMENTOS PREMIUM</h3>
            <span class="partners__phone">(11) 3644-6004</span>
            <!-- <span class="partners__mail">claudiobergamo@yahoo.com.br</span> -->
            <a href="http://goldy.com.br"
              target="_blank"
              class="partners__link">
              www.goldy.com.br
            </a>

            <a href="mailto:"
              class="button">
              Contatar
            </a>
          </div>
        </div>
      </div>

    </div>
	</li>
</ul> <!-- / accordion -->

<?php
get_footer();
