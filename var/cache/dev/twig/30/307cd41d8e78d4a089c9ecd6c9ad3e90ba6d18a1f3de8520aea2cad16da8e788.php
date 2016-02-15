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
        $__internal_2f33aafaf6aece55da2bc9814717f4ec9e98bb094f8c4e83b6e9aa24b24837bc = $this->env->getExtension("native_profiler");
        $__internal_2f33aafaf6aece55da2bc9814717f4ec9e98bb094f8c4e83b6e9aa24b24837bc->enter($__internal_2f33aafaf6aece55da2bc9814717f4ec9e98bb094f8c4e83b6e9aa24b24837bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2f33aafaf6aece55da2bc9814717f4ec9e98bb094f8c4e83b6e9aa24b24837bc->leave($__internal_2f33aafaf6aece55da2bc9814717f4ec9e98bb094f8c4e83b6e9aa24b24837bc_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_232c03d2446c5fc9a3787ae1746d172094760f431ec2daf9c33de4cceb9d1485 = $this->env->getExtension("native_profiler");
        $__internal_232c03d2446c5fc9a3787ae1746d172094760f431ec2daf9c33de4cceb9d1485->enter($__internal_232c03d2446c5fc9a3787ae1746d172094760f431ec2daf9c33de4cceb9d1485_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_232c03d2446c5fc9a3787ae1746d172094760f431ec2daf9c33de4cceb9d1485->leave($__internal_232c03d2446c5fc9a3787ae1746d172094760f431ec2daf9c33de4cceb9d1485_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_10540ad132352b41263ec956af5624578fb909c61ba85270c0d3c7e8272c8eec = $this->env->getExtension("native_profiler");
        $__internal_10540ad132352b41263ec956af5624578fb909c61ba85270c0d3c7e8272c8eec->enter($__internal_10540ad132352b41263ec956af5624578fb909c61ba85270c0d3c7e8272c8eec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_10540ad132352b41263ec956af5624578fb909c61ba85270c0d3c7e8272c8eec->leave($__internal_10540ad132352b41263ec956af5624578fb909c61ba85270c0d3c7e8272c8eec_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d1a976895c1257d4d144e7fac5cfdc22552d21fb955c2595237c5bdb4969c129 = $this->env->getExtension("native_profiler");
        $__internal_d1a976895c1257d4d144e7fac5cfdc22552d21fb955c2595237c5bdb4969c129->enter($__internal_d1a976895c1257d4d144e7fac5cfdc22552d21fb955c2595237c5bdb4969c129_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d1a976895c1257d4d144e7fac5cfdc22552d21fb955c2595237c5bdb4969c129->leave($__internal_d1a976895c1257d4d144e7fac5cfdc22552d21fb955c2595237c5bdb4969c129_prof);

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
