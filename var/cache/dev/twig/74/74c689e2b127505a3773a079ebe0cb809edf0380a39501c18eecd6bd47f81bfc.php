<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_81ec6e8ce044baebd8366004b7b0c7659ca11eec0433739971855b709ea06c55 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e0ff9ed55799761ea1cf6c8df9920e69155223a3ef60f5fc876775a8a916f951 = $this->env->getExtension("native_profiler");
        $__internal_e0ff9ed55799761ea1cf6c8df9920e69155223a3ef60f5fc876775a8a916f951->enter($__internal_e0ff9ed55799761ea1cf6c8df9920e69155223a3ef60f5fc876775a8a916f951_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e0ff9ed55799761ea1cf6c8df9920e69155223a3ef60f5fc876775a8a916f951->leave($__internal_e0ff9ed55799761ea1cf6c8df9920e69155223a3ef60f5fc876775a8a916f951_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2c951e2ca79da257fe6a172a18a45cb976da760e641a0b7ac1df117e21063a3f = $this->env->getExtension("native_profiler");
        $__internal_2c951e2ca79da257fe6a172a18a45cb976da760e641a0b7ac1df117e21063a3f->enter($__internal_2c951e2ca79da257fe6a172a18a45cb976da760e641a0b7ac1df117e21063a3f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2c951e2ca79da257fe6a172a18a45cb976da760e641a0b7ac1df117e21063a3f->leave($__internal_2c951e2ca79da257fe6a172a18a45cb976da760e641a0b7ac1df117e21063a3f_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_4b3fd1dde457efb7ff8da9a64e60038600e6b4fe5663f9437fd163deb5aafd79 = $this->env->getExtension("native_profiler");
        $__internal_4b3fd1dde457efb7ff8da9a64e60038600e6b4fe5663f9437fd163deb5aafd79->enter($__internal_4b3fd1dde457efb7ff8da9a64e60038600e6b4fe5663f9437fd163deb5aafd79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_4b3fd1dde457efb7ff8da9a64e60038600e6b4fe5663f9437fd163deb5aafd79->leave($__internal_4b3fd1dde457efb7ff8da9a64e60038600e6b4fe5663f9437fd163deb5aafd79_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_e4fa30953fe75417b749b996cfa51c485216ee9ff06d122ce9dbf9c076615cc6 = $this->env->getExtension("native_profiler");
        $__internal_e4fa30953fe75417b749b996cfa51c485216ee9ff06d122ce9dbf9c076615cc6->enter($__internal_e4fa30953fe75417b749b996cfa51c485216ee9ff06d122ce9dbf9c076615cc6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_e4fa30953fe75417b749b996cfa51c485216ee9ff06d122ce9dbf9c076615cc6->leave($__internal_e4fa30953fe75417b749b996cfa51c485216ee9ff06d122ce9dbf9c076615cc6_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
