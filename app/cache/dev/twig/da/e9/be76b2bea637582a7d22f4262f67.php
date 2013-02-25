<?php

/* ::layout.html.twig */
class __TwigTemplate_dae9be76b2bea637582a7d22f4262f67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
 
\t\t<title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t
\t\t";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "\t</head>
\t<body>
\t\t<div id=\"header\">
\t\t\t<img alt=\"Banner\" title=\"Earth\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("style/banner.png"), "html", null, true);
        echo "\">
\t\t\t<nav id=\"nav\" class=\"navbar navbar-inverse navbar-static-top\" >
\t\t\t\t<div class=\"navbar-inner\">
\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t<a class=\"brand\" href=\"#header\">Kourou</a>
\t\t\t\t\t</div>
\t\t\t\t
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t
\t\t\t\t\t\t<ul class=\"nav\">
\t\t\t\t\t\t\t<li><a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("musee_accueil"), "html", null, true);
        echo "\">Accueil</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\">Articles</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("musee_aPropos"), "html", null, true);
        echo "\">A propos</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("musee_infosPratiques"), "html", null, true);
        echo "\">Infos pratiques</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("musee_contact"), "html", null, true);
        echo "\">Contact</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t</nav>
\t\t</div>
\t
\t
\t\t";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 43
        echo "\t\t<script src=\"bootstrap/js/jquery.js\"></script>
\t\t<script src=\"bootstrap/js/bootstrap.js\"></script>
\t</body>
\t
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Musee";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "\t\t\t <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
\t\t\t <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("style/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
\t\t";
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        // line 41
        echo "\t\t\t
\t\t";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 41,  110 => 40,  104 => 12,  99 => 11,  96 => 10,  90 => 8,  82 => 43,  80 => 40,  68 => 31,  64 => 30,  60 => 29,  55 => 27,  42 => 17,  37 => 14,  35 => 10,  30 => 8,  22 => 2,  31 => 7,  28 => 6,);
    }
}
