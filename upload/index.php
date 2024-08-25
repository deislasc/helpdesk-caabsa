<?php
/* * *******************************************************************
  index.php

  Helpdesk landing page. Please customize it to fit your needs.

  Peter Rotich <peter@osticket.com>
  Copyright (c)  2006-2013 osTicket
  http://www.osticket.com

  Released under the GNU General Public License WITHOUT ANY WARRANTY.
  See LICENSE.TXT for details.

  vim: expandtab sw=4 ts=4 sts=4:
 * ******************************************************************** */
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';

$section = 'home';
require(CLIENTINC_DIR . 'header.inc.php');
?>
</div>

<div class="container-fluid bgfront">
    <div class="container">
        <div class="row support-image front-boxes">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center centered">

                <?php
                if ($cfg && ($page = $cfg->getLandingPage()))
                    echo $page->getBodyWithImages();
                else
                    echo '<h1>' . __('Quick and Efficient Support') . '</h1>';
                ?>
            </div></div></div></div>
<div class="container">
    <div class="row front-boxes">
        <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><img src="<?php echo ASSETS_PATH; ?>images/qr_chatbot.png" alt="<?php echo __('Open a New Ticket') ?>" style="width:94px;"></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('Genera tu ticket a través de WhatsApp!. Escanea el código QR, el cual abrira nuestro chatbot para poder generar tu solicitud') ?></div>
                    <!-- <div class="text-right"><a class="btn btn-success" href="<?php echo ROOT_PATH; ?>open.php"><?php echo __('Open a New Ticket') ?></a> <br><br><br></div> -->
                </div> 
        <!-- <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="row bgcolor">
                <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><i class="fas fa-question"></i></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('Before creating your ticket, please check our knowledgebase section. You will find solutions to most of your queries.') ?></div>
                    <div class="text-right"><a class="btn btn-info" href="<?php echo ROOT_PATH; ?>kb/index.php"><?php echo __('Knowledgebase') ?></a> <br><br><br></div>
                </div>  -->

                    <!--Botón Nuevo ticket-->
                <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><img src="<?php echo ASSETS_PATH; ?>images/new_ticket_icon.png" alt="<?php echo __('Open a New Ticket') ?>" style="width:94px;"></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('Genera un nuevo ticket de soporte. Da clic en el botón para generar tu solicitud. Proporciona la mayor cantidad de detalles posible para agilizar el proceso de asistencia.') ?></div>
                    <div class="text-right"><a class="btn btn-success1" href="<?php echo ROOT_PATH; ?>open.php"><?php echo __('Open a New Ticket') ?></a> <br><br><br></div>
                </div>

                <!-- <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><img src="<?php echo ASSETS_PATH; ?>images/new_ticket_icon.png" alt="<?php echo __('Open a New Ticket') ?>" style="width:96px;"></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('Submit a new support request. Please provide as much detail as possible so we can best assist you. To update a previously submitted ticket, please click on the " Check Ticket Status" link below. A valid email address is required.') ?></div>
                    <div class="text-right"><a class="btn btn-success" href="<?php echo ROOT_PATH; ?>open.php"><?php echo __('Open a New Ticket') ?></a> <br><br><br></div>
                </div>  -->

                <!--Botón Email-->
                <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><img src="<?php echo ASSETS_PATH; ?>images/check_status_icon.png" alt="<?php echo __('Check Ticket Status') ?>" style="width:94px;"></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('También puedes generar tu ticket enviando un correo electrónico, dando clic en el botón "Enviar Correo Electrónico".') ?></div>

                    <div class="text-right"><a class="btn btn-primary" href="https://mail.google.com/mail/?view=cm&fs=1&to=helpdesk.ti@caabsa.com.mx" target="_blank"><?php echo __('Enviar Correo Electrónico') ?></a> <br><br><br></div>
                </div> 
            </div>

                <!-- <div class="col-xs-12 col-sm-6 col-lg-4 text-justify box2">
                    <div class="icon">
                        <div class="image"><img src="<?php echo ASSETS_PATH; ?>images/check_status_icon.png" alt="<?php echo __('Check Ticket Status') ?>" style="width:96px;"></div>
                    </div>
                    <div class="text-box-middle"><?php echo __('Check status of previously opened ticket. we provide archives and history of all your support requests complete with responses.') ?></div>

                    <div class="text-right"><a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>view.php"><?php echo __('Check Ticket Status') ?></a> <br><br><br></div>
                </div> 
            </div> -->

        </div>
    </div>
</div>

<div class="container">


    <?php require(CLIENTINC_DIR . 'footer.inc.php'); ?>
