<?php


class SnowEffectPlugin extends MantisPlugin{

    /**
     * A method that populates the plugin information and minimum requirements.
     * @return void
     */
    function register() {
        $this->name = 'SnowEffect';
        $this->description = 'Happy Christmas - Oh oh oh';

        $this->version     = '1.0';
        $this->requires    = array(
            'MantisCore'       => '2.0.0',
        );

        $this->author      = 'Alexis POKORSKI';
        $this->contact     = '';
        $this->url         = '';
    }

    /**
     * Event hook declaration.
     * @return array
     */
    function hooks(){
        return array(
            "EVENT_LAYOUT_RESOURCES" => "resources",
            "EVENT_LAYOUT_BODY_BEGIN" => "snow_html",
            "EVENT_LAYOUT_CONTENT_BEGIN" => "snowButton"
        );
    }

    /**
     * Importe le nécessaire pour fonctionner
     */
    function resources(){
        /*Créer le cookie s'il n'existe pas*/
        if(!isset($_COOKIE['snowActive'])){
            error_reporting(0);
            echo '<script type="text/javascript">document.cookie = "snowActive=1; expires=\'\'; path=/";</script>';
        }
        echo '<link rel="stylesheet" type="text/css" href="' . plugin_file( 'neige.css' ) . '" />';
        echo '<script type="text/javascript" src="' . plugin_file('snowEffect.js') . '" ></script>';
    }

    /**
     * Déclaration du code html permettant la gestion de la neige
     */
    function snow_html(){
            if($_COOKIE["snowActive"] == '1') {
                echo "<div class=\"snow active\" id=\"snow\">";
            }
            else{
                echo "<div class=\"snow hide\" id=\"snow\">";
            }
            echo "<div class=\"snow__layer\">
                    <div class=\"snow__fall\"></div>
                  </div>
                  <div class=\"snow__layer\">
                    <div class=\"snow__fall\"></div>
                  </div>
                  <div class=\"snow__layer\">
                    <div class=\"snow__fall\"></div>
                    <div class=\"snow__fall\"></div>
                    <div class=\"snow__fall\"></div>
                  </div>
                  <div class=\"snow__layer\">
                     <div class=\"snow__fall\"></div>
                  </div>
            </div>";
    }

    /**
     * Bouton permettant d'activer ou désactiver la neige
     */
    function snowButton(){
        if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~',$_SERVER['HTTP_USER_AGENT'])) {
            //IE do nothing
        }
        else{
            echo "<input id=\"activeSnow\" type=\"button\" class='btn btn-primary btn-white btn-round btn-xs' value=\"Snow On/Off\">";
        }
    }







}