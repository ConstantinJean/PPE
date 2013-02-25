<?php

/* MuseeSiteBundle:Site:aPropos.html.twig */
class __TwigTemplate_85a77426aa9a23bc9c8fcc145d3a34f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MuseeSiteBundle::layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MuseeSiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "\t<div class=\"container-fluid\">
\t\t<div class=\"page-header\"><h1>A Propos</h1></div>
\t\t<div class=\"row-fluid\">
\t\t\t<div class=\"span12 well\">
\t\t\t\tLe musée de l'espace situé dans le Centre Spatial Guyanais non loin de la base de lancement opérationnelle des fusées Ariane est un lieu de découverte et de vulgarisation des sciences et technologies de l'espace sur 1200m² à destination d'un public souhaitant enrichir sa culture scientifique et technique.<br>
\t\t\t\tVous embarquez pour un voyage à bord d'un vaisseau spatial au travers de plusieurs expositions permanentes et ponctuelles qui vous sont proposées tout au long de l'année.<br>
\t\t\t\tA savoir l'incontournable lanceur Ariane sous forme de maquette en taille réelle que vous pouvez observer et comparer par rapport à la taille moyenne d'un humain devant l'entrée du musée.<br>
\t\t\t\tA l'intérieur de l'établissement dans un cadre assez obscur évoquant l'espace, vous accédez au temple de l'information par plusieurs modules mis en place thématiques comprenant plusieurs maquettes et qui offre un parcours diversifié de l'aventure spatiale mondiale et surtout européenne :<br>
\t\t\t\t<ul>
\t\t\t\t\t<li>la conquête de l'espace</li>
\t\t\t\t\t<li>du rêve à la réalité</li>
\t\t\t\t\t<li>les lanceurs européens</li>
\t\t\t\t\t<li>les satellites</li>
\t\t\t\t\t<li>les charges utiles d'application scientifiques</li>
\t\t\t\t\t<li>le futur</li>
\t\t\t\t</ul>
\t\t\t\tPour les enfants des animations lego sont mis en place à la merci de leur imagination.
\t\t\t\tSont mis également à votre disposition des sélections de films scientifiques et techniques et des expositions d'appareils de mesures et de libre consultation sur l'impact des activités spatiales.
\t\t\t\tDes spectacles tels que des présentations des activités spatiales, alunissage d'un être humain, préparation au lancement sont organisés.

\t\t\t</div>
\t\t</div>
\t</div>
\t
";
    }

    public function getTemplateName()
    {
        return "MuseeSiteBundle:Site:aPropos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 7,  28 => 6,);
    }
}
