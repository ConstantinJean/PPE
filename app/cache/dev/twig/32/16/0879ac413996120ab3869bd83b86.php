<?php

/* MuseeSiteBundle:Site:contact.html.twig */
class __TwigTemplate_32160879ac413996120ab3869bd83b86 extends Twig_Template
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

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "\t<div class=\"container-fluid\">
\t\t\t<div class=\"page-header\"><h1>Nous Contacter</h1></div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span2\">
\t\t\t\t\t<h4>Par Courrier</h4>
\t\t\t\t\t<hr>
\t\t\t\t\t<address class=\"well well-small\">
\t\t\t\t\t\t<strong>Musée de Kourou</strong><br>
\t\t\t\t\t\tRoute de l'espace<br>
\t\t\t\t\t\t97310 Kourou<br>
\t\t\t\t\t\tGuyane française
\t\t\t\t\t</address>
\t\t\t\t</div>
\t\t\t
\t\t\t\t<div class=\"offset1 span2\">
\t\t\t\t\t<h4>Par Téléphone</h4>
\t\t\t\t\t<hr>
\t\t\t\t\t<h6>Téléphone : 05 94 33 53 84</h6>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t
\t\t\t</div>
\t\t</div>
";
    }

    public function getTemplateName()
    {
        return "MuseeSiteBundle:Site:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 6,  28 => 5,);
    }
}
