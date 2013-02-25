<?php

/* MuseeSiteBundle:Site:infosPratiques.html.twig */
class __TwigTemplate_512b4f16b6821cd876471f80a06be36b extends Twig_Template
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
\t\t<div class=\"row-fluid pagination-centered\">
\t\t\t<div id=\"contact-img\" class=\"span3\">
\t\t\t\t<div  class=\"thumbnail\"><img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("style/thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"Musee\" title=\"Musee\"></div>
\t\t\t</div>
\t\t\t<div class=\"offset1 span6\">
\t\t\t\t<table class=\"table table-striped table-hover table-bordered \">
\t\t\t\t\t<caption>
\t\t\t\t\t\t<h4>Horaires d'ouverture</h4>
\t\t\t\t\t</caption>
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Jour</th>
\t\t\t\t\t\t\t<th>Horaires</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Lundi</th>
\t\t\t\t\t\t\t<th>8h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Mardi</th>
\t\t\t\t\t\t\t<th>8h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Mercredi</th>
\t\t\t\t\t\t\t<th>8h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Jeudi</th>
\t\t\t\t\t\t\t<th>8h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Vendredi</th>
\t\t\t\t\t\t\t<th>8h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Samedi</th>
\t\t\t\t\t\t\t<th>14h00 - 18h00</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Dimanche</th>
\t\t\t\t\t\t\t<th>Fermé</th>
\t\t\t\t\t\t<tr>
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"row-fluid\">
\t\t\t<div class=\"span4\">
\t\t\t\t<address class=\"well\">
\t\t\t\t\t<strong>Musée de Kourou</strong><br>
\t\t\t\t\tRoute de l’espace<br>
\t\t\t\t\t97310 Kourou<br>
\t\t\t\t\tTéléphone : 05 94 33 53 84
\t\t\t\t</address>
\t\t\t\t<br>
\t\t\t\t<table class=\"table table-striped table-hover table-bordered \">
\t\t\t\t\t<caption>
\t\t\t\t\t\t<h4>Tarifs entrée</h4>
\t\t\t\t\t</caption>
\t\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th style=\"text-align: center;\" colspan=\"2\"><h5>Plein Tarif</h5></th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Adulte</th>
\t\t\t\t\t\t<th>7 euros</th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Enfant de moins de 10 ans</th>
\t\t\t\t\t\t<th>4 euros</th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th style=\"text-align: center;\" colspan=\"2\"><h5>Tarif réduit</h5></th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Adulte</th>
\t\t\t\t\t\t<th>4 euros</th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Enfant de moins de 10 ans</th>
\t\t\t\t\t\t<th>2.50 euros</th>
\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"offset1 span5 well\" >
\t\t\t\t<iframe width=\"100%\" height=\"350\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.fr/maps?near=Route+de+l'Espace,+Guyane+fran%C3%A7aise&amp;geocode=CUn2Nf1vAh0hFQXkTgAd3N_b_Cnzdd-x-FsOjTFHmUkc8qNYBQ&amp;q=museum&amp;f=l&amp;sll=5.17019,-52.694807&amp;sspn=0.018101,0.033023&amp;ie=UTF8&amp;hq=museum&amp;hnear=&amp;t=m&amp;ll=5.169074,-52.683745&amp;spn=0.006295,0.033939&amp;output=embed\"></iframe><br /><small><a href=\"https://maps.google.fr/maps?near=Route+de+l'Espace,+Guyane+fran%C3%A7aise&amp;geocode=CUn2Nf1vAh0hFQXkTgAd3N_b_Cnzdd-x-FsOjTFHmUkc8qNYBQ&amp;q=museum&amp;f=l&amp;sll=5.17019,-52.694807&amp;sspn=0.018101,0.033023&amp;ie=UTF8&amp;hq=museum&amp;hnear=&amp;t=m&amp;ll=5.169074,-52.683745&amp;spn=0.006295,0.033939&amp;source=embed\" style=\"color:#0000FF;text-align:left\">Agrandir le plan</a></small>
\t\t\t</div>\t\t\t
\t\t</div>
\t</div>

";
    }

    public function getTemplateName()
    {
        return "MuseeSiteBundle:Site:infosPratiques.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 9,  31 => 6,  28 => 5,);
    }
}
