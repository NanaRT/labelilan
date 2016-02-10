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
        $__internal_c22acf372ead152741fc5f304159a8a979a379bc28fadb844543fec849e13576 = $this->env->getExtension("native_profiler");
        $__internal_c22acf372ead152741fc5f304159a8a979a379bc28fadb844543fec849e13576->enter($__internal_c22acf372ead152741fc5f304159a8a979a379bc28fadb844543fec849e13576_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c22acf372ead152741fc5f304159a8a979a379bc28fadb844543fec849e13576->leave($__internal_c22acf372ead152741fc5f304159a8a979a379bc28fadb844543fec849e13576_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_0339409d4eed8697260900fc889910bd8371248db191d077255d87c1a6a9e456 = $this->env->getExtension("native_profiler");
        $__internal_0339409d4eed8697260900fc889910bd8371248db191d077255d87c1a6a9e456->enter($__internal_0339409d4eed8697260900fc889910bd8371248db191d077255d87c1a6a9e456_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_0339409d4eed8697260900fc889910bd8371248db191d077255d87c1a6a9e456->leave($__internal_0339409d4eed8697260900fc889910bd8371248db191d077255d87c1a6a9e456_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_9b5f4892b48101c27f8113fadc42ac0fb224ec16f88c8e1341394daa44d0864e = $this->env->getExtension("native_profiler");
        $__internal_9b5f4892b48101c27f8113fadc42ac0fb224ec16f88c8e1341394daa44d0864e->enter($__internal_9b5f4892b48101c27f8113fadc42ac0fb224ec16f88c8e1341394daa44d0864e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_9b5f4892b48101c27f8113fadc42ac0fb224ec16f88c8e1341394daa44d0864e->leave($__internal_9b5f4892b48101c27f8113fadc42ac0fb224ec16f88c8e1341394daa44d0864e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_10c74b52286d699493e58d2a178d619dedf8f20c24344812e43e0206b3448a9c = $this->env->getExtension("native_profiler");
        $__internal_10c74b52286d699493e58d2a178d619dedf8f20c24344812e43e0206b3448a9c->enter($__internal_10c74b52286d699493e58d2a178d619dedf8f20c24344812e43e0206b3448a9c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_10c74b52286d699493e58d2a178d619dedf8f20c24344812e43e0206b3448a9c->leave($__internal_10c74b52286d699493e58d2a178d619dedf8f20c24344812e43e0206b3448a9c_prof);

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
