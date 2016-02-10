<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_25ba1302835eb0134a26c408377595f7ad8e1ef7fcfefe2dc3016c882a2980eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2d1884bba76244e3316ed2a933f76563fcd4e0efc6d87428e4f53e84a6ced683 = $this->env->getExtension("native_profiler");
        $__internal_2d1884bba76244e3316ed2a933f76563fcd4e0efc6d87428e4f53e84a6ced683->enter($__internal_2d1884bba76244e3316ed2a933f76563fcd4e0efc6d87428e4f53e84a6ced683_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2d1884bba76244e3316ed2a933f76563fcd4e0efc6d87428e4f53e84a6ced683->leave($__internal_2d1884bba76244e3316ed2a933f76563fcd4e0efc6d87428e4f53e84a6ced683_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9e57cfb34976d6f04aa52027f9fcc2ec8b471b7c508b95e75288ee332d318060 = $this->env->getExtension("native_profiler");
        $__internal_9e57cfb34976d6f04aa52027f9fcc2ec8b471b7c508b95e75288ee332d318060->enter($__internal_9e57cfb34976d6f04aa52027f9fcc2ec8b471b7c508b95e75288ee332d318060_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_9e57cfb34976d6f04aa52027f9fcc2ec8b471b7c508b95e75288ee332d318060->leave($__internal_9e57cfb34976d6f04aa52027f9fcc2ec8b471b7c508b95e75288ee332d318060_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_e7c967d9f785404d5e4dd55107ecaae9b2f44b1a40efd581ebdfd271be473708 = $this->env->getExtension("native_profiler");
        $__internal_e7c967d9f785404d5e4dd55107ecaae9b2f44b1a40efd581ebdfd271be473708->enter($__internal_e7c967d9f785404d5e4dd55107ecaae9b2f44b1a40efd581ebdfd271be473708_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_e7c967d9f785404d5e4dd55107ecaae9b2f44b1a40efd581ebdfd271be473708->leave($__internal_e7c967d9f785404d5e4dd55107ecaae9b2f44b1a40efd581ebdfd271be473708_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_f053ebb2de52c06179b9e2a639b94a1e1df14196e7de2de6388575d111981f53 = $this->env->getExtension("native_profiler");
        $__internal_f053ebb2de52c06179b9e2a639b94a1e1df14196e7de2de6388575d111981f53->enter($__internal_f053ebb2de52c06179b9e2a639b94a1e1df14196e7de2de6388575d111981f53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_f053ebb2de52c06179b9e2a639b94a1e1df14196e7de2de6388575d111981f53->leave($__internal_f053ebb2de52c06179b9e2a639b94a1e1df14196e7de2de6388575d111981f53_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
