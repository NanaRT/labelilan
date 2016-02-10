<?php

/* base.html.twig */
class __TwigTemplate_5e99b16baf96918c56e0fa5f3c78608fc6bf54944b550af6c833bbb52254637f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_769e93c60e2e2044026e124e648fc1244f612eba6bd4881bd61d370302eb7e0f = $this->env->getExtension("native_profiler");
        $__internal_769e93c60e2e2044026e124e648fc1244f612eba6bd4881bd61d370302eb7e0f->enter($__internal_769e93c60e2e2044026e124e648fc1244f612eba6bd4881bd61d370302eb7e0f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--
 * A Design by Léa DESTAILLAC
 * Author: Alana TAYLOR
 * Author URL: alanarosetaylor.com
-->
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

\t<link rel=\"icon\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/app/img/favicon.ico"), "html", null, true);
        echo "\"  type=\"image/x-icon\"  />
    <title>";
        // line 18
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t<link rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css\">
\t<link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/app/css/bootstrap.css"), "html", null, true);
        echo "\" />
\t<link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/app/css/bootstrap.min.css"), "html", null, true);
        echo "\" />
\t<link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/app/css/shop-homepage.css"), "html", null, true);
        echo "\" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
         <div class=\"container-fluid\">
\t        <div class=\"navbar-header\">
\t          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
\t            <span class=\"sr-only\">Activer la navigation</span>
\t            <span class=\"icon-bar\"></span>
\t            <span class=\"icon-bar\"></span>
\t            <span class=\"icon-bar\"></span>
\t          </button>
\t          <a class=\"navbar-brand\" href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("labelilan");
        echo "\">LGC</a>
\t        </div>
\t\t    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
\t\t\t\t\t";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["searchCategoryService"]) ? $context["searchCategoryService"] : $this->getContext($context, "searchCategoryService")), "getSearchingCategory", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 50
            echo "\t\t\t            <li class=\"dropdown\">
\t\t\t            \t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t            \t\t";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo " <span class=\"caret\"></span>
\t\t\t            \t</a>
\t\t\t            \t<ul class=\"dropdown-menu\">
\t\t\t            \t\t";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "game", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
                // line 56
                echo "\t\t\t\t            \t\t<li>
\t\t            \t\t\t\t\t<a href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("game_show", array("id" => $this->getAttribute($context["game"], "id", array()))), "html", null, true);
                echo "\" >
\t\t\t\t            \t\t\t\t";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name", array()), "html", null, true);
                echo "
\t\t\t\t            \t\t\t</a>
\t\t\t\t            \t\t</li>
\t\t\t\t            \t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "\t\t                    </ul>
\t\t                </li>
\t                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                    <li>
                        <a href=\"#\">Contact</a>
                    </li>
                </ul>
\t\t        <ul class=\"nav navbar-nav navbar-right\">
\t\t          ";
        // line 70
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 71
            echo "\t\t\t          <li>
\t\t\t\t          <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t          <span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></span>
\t\t\t\t\t          Mon profil 
\t\t\t\t          </a>
\t\t\t          </li>
\t\t\t          <li>
\t\t\t\t          <a class=\"btn btn-inverse\" href=\"";
            // line 78
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
\t\t\t\t\t          <span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span>
\t\t\t\t\t          Se déconnecter
\t\t\t\t          </a>
\t\t\t          </li>
\t\t          ";
        } else {
            // line 84
            echo "\t\t         \t  <li>
\t\t\t         \t  <a class=\"btn btn-inverse\" href=\"";
            // line 85
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\">
\t\t\t\t         \t  <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
\t\t\t\t         \t  Inscription
\t\t\t         \t  </a>
\t\t         \t  </li>
\t\t         \t  <li>
\t\t\t         \t  <a class=\"btn btn-inverse\" href=\"";
            // line 91
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">
\t\t\t\t\t          <span class=\"glyphicon glyphicon-check\" aria-hidden=\"true\"></span>
\t\t\t\t\t          Connexion
\t\t\t\t          </a>
\t\t\t          </li>
\t\t          ";
        }
        // line 97
        echo "                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    ";
        // line 104
        $this->displayBlock('body', $context, $blocks);
        // line 106
        echo "    
    <div id=\"footer\">
        <div class=\"row text-center\">
\t\t\t<div class=\"col-xs-4\">
\t\t\t    <div class=\"col-xs-2\">
\t\t\t\t  \t<a href=\"https://www.facebook.com/events/1674457179493309/?ref_dashboard_filter=hosting&action_history=null\" >
\t\t\t    \t\t<i class=\"fa fa-facebook-official fa-2x\"></i>
\t\t\t    \t</a>
\t\t\t    </div>
\t\t\t</div>
\t\t\t<div class=\"col-xs-4\">
\t\t\t</div>
\t\t\t<div class=\"col-xs-4\">
    \t\t\t2016 Label[i] | All Right Reserved
\t\t\t</div>
\t    </div>
    </div>

\t<script type=\"text/javascript\" src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    
    ";
        // line 126
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "048c425_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_0") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_1_bootstrap-datepicker_1.js");
            // line 127
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_1") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_1_bootstrap_2.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_2") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_1_bootstrap.min_3.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_3") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_1_custom_4.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_4") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_1.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_5") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_1_bootstrap-datepicker_1_2.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_6") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_1_bootstrap.min_3_3.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_7") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_1_bootstrap_2_4.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_8") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_1_custom_4_5.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_9") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_2_35a8e64_1_6.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_10") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_2_35a8e64_comments_1_2_7.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_11") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_048c425_part_2_jquery.min_3_8.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_12") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_35a8e64_9.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_13") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_35a8e64_comments_1_10.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "048c425_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425_14") : $this->env->getExtension('asset')->getAssetUrl("js/048c425_part_2_jquery.min_11.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "048c425"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_048c425") : $this->env->getExtension('asset')->getAssetUrl("js/048c425.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 129
        echo "\t<!-- Include all JavaScripts, compiled by Assetic -->
\t<script type=\"text/javascript\" src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
</body>

</html>";
        
        $__internal_769e93c60e2e2044026e124e648fc1244f612eba6bd4881bd61d370302eb7e0f->leave($__internal_769e93c60e2e2044026e124e648fc1244f612eba6bd4881bd61d370302eb7e0f_prof);

    }

    // line 18
    public function block_title($context, array $blocks = array())
    {
        $__internal_ec654d6ad4d2fe09df2e01bef8df33937e099f68ec410f346f550fa41c64ce77 = $this->env->getExtension("native_profiler");
        $__internal_ec654d6ad4d2fe09df2e01bef8df33937e099f68ec410f346f550fa41c64ce77->enter($__internal_ec654d6ad4d2fe09df2e01bef8df33937e099f68ec410f346f550fa41c64ce77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Label[i] Gaming Championship";
        
        $__internal_ec654d6ad4d2fe09df2e01bef8df33937e099f68ec410f346f550fa41c64ce77->leave($__internal_ec654d6ad4d2fe09df2e01bef8df33937e099f68ec410f346f550fa41c64ce77_prof);

    }

    // line 104
    public function block_body($context, array $blocks = array())
    {
        $__internal_fc90c712d68889a54d654a1830a06fa6b88279dcad78d1b985bfe6f64fd6411d = $this->env->getExtension("native_profiler");
        $__internal_fc90c712d68889a54d654a1830a06fa6b88279dcad78d1b985bfe6f64fd6411d->enter($__internal_fc90c712d68889a54d654a1830a06fa6b88279dcad78d1b985bfe6f64fd6411d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 105
        echo "    ";
        
        $__internal_fc90c712d68889a54d654a1830a06fa6b88279dcad78d1b985bfe6f64fd6411d->leave($__internal_fc90c712d68889a54d654a1830a06fa6b88279dcad78d1b985bfe6f64fd6411d_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 105,  350 => 104,  338 => 18,  327 => 130,  324 => 129,  226 => 127,  222 => 126,  217 => 124,  197 => 106,  195 => 104,  186 => 97,  177 => 91,  168 => 85,  165 => 84,  156 => 78,  147 => 72,  144 => 71,  142 => 70,  135 => 65,  127 => 62,  117 => 58,  113 => 57,  110 => 56,  106 => 55,  100 => 52,  96 => 50,  92 => 49,  85 => 45,  60 => 23,  56 => 22,  52 => 21,  46 => 18,  42 => 17,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--*/
/*  * A Design by Léa DESTAILLAC*/
/*  * Author: Alana TAYLOR*/
/*  * Author URL: alanarosetaylor.com*/
/* -->*/
/* <html lang="en">*/
/* */
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <meta name="description" content="">*/
/*     <meta name="author" content="">*/
/* */
/* 	<link rel="icon" href="{{ asset('bundles/app/img/favicon.ico') }}"  type="image/x-icon"  />*/
/*     <title>{%block title%}Label[i] Gaming Championship{%endblock%}</title>*/
/* */
/* 	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">*/
/* 	<link rel="stylesheet" href="{{ asset('bundles/app/css/bootstrap.css')  }}" />*/
/* 	<link rel="stylesheet" href="{{ asset('bundles/app/css/bootstrap.min.css')  }}" />*/
/* 	<link rel="stylesheet" href="{{ asset('bundles/app/css/shop-homepage.css')  }}" />*/
/* */
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* </head>*/
/* */
/* <body>*/
/* */
/*     <!-- Navigation -->*/
/*     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">*/
/*          <div class="container-fluid">*/
/* 	        <div class="navbar-header">*/
/* 	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/* 	            <span class="sr-only">Activer la navigation</span>*/
/* 	            <span class="icon-bar"></span>*/
/* 	            <span class="icon-bar"></span>*/
/* 	            <span class="icon-bar"></span>*/
/* 	          </button>*/
/* 	          <a class="navbar-brand" href="{{ path('labelilan') }}">LGC</a>*/
/* 	        </div>*/
/* 		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*                 <ul class="nav navbar-nav">*/
/* 					{%for category in searchCategoryService.getSearchingCategory()%}*/
/* 			            <li class="dropdown">*/
/* 			            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">*/
/* 			            		{{category.name}} <span class="caret"></span>*/
/* 			            	</a>*/
/* 			            	<ul class="dropdown-menu">*/
/* 			            		{%for game in category.game%}*/
/* 				            		<li>*/
/* 		            					<a href="{{path('game_show', {'id':game.id}) }}" >*/
/* 				            				{{game.name}}*/
/* 				            			</a>*/
/* 				            		</li>*/
/* 				            	{%endfor%}*/
/* 		                    </ul>*/
/* 		                </li>*/
/* 	                {%endfor%}*/
/*                     <li>*/
/*                         <a href="#">Contact</a>*/
/*                     </li>*/
/*                 </ul>*/
/* 		        <ul class="nav navbar-nav navbar-right">*/
/* 		          {% if is_granted("IS_AUTHENTICATED_REMEMBERED") %}*/
/* 			          <li>*/
/* 				          <a href="{{ path('user_show', { 'id': app.user.id }) }}">*/
/* 					          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>*/
/* 					          Mon profil */
/* 				          </a>*/
/* 			          </li>*/
/* 			          <li>*/
/* 				          <a class="btn btn-inverse" href="{{ path('fos_user_security_logout') }}">*/
/* 					          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>*/
/* 					          Se déconnecter*/
/* 				          </a>*/
/* 			          </li>*/
/* 		          {%else%}*/
/* 		         	  <li>*/
/* 			         	  <a class="btn btn-inverse" href="{{ path('fos_user_registration_register') }}">*/
/* 				         	  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>*/
/* 				         	  Inscription*/
/* 			         	  </a>*/
/* 		         	  </li>*/
/* 		         	  <li>*/
/* 			         	  <a class="btn btn-inverse" href="{{ path('fos_user_security_login') }}">*/
/* 					          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>*/
/* 					          Connexion*/
/* 				          </a>*/
/* 			          </li>*/
/* 		          {%endif%}*/
/*                 </ul>*/
/*             </div>*/
/*             <!-- /.navbar-collapse -->*/
/*         </div>*/
/*         <!-- /.container -->*/
/*     </nav>*/
/*     */
/*     {%block body%}*/
/*     {%endblock%}*/
/*     */
/*     <div id="footer">*/
/*         <div class="row text-center">*/
/* 			<div class="col-xs-4">*/
/* 			    <div class="col-xs-2">*/
/* 				  	<a href="https://www.facebook.com/events/1674457179493309/?ref_dashboard_filter=hosting&action_history=null" >*/
/* 			    		<i class="fa fa-facebook-official fa-2x"></i>*/
/* 			    	</a>*/
/* 			    </div>*/
/* 			</div>*/
/* 			<div class="col-xs-4">*/
/* 			</div>*/
/* 			<div class="col-xs-4">*/
/*     			2016 Label[i] | All Right Reserved*/
/* 			</div>*/
/* 	    </div>*/
/*     </div>*/
/* */
/* 	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>*/
/*     */
/*     {% javascripts '@AppBundle/Resources/public/js/*' 'js/*' %}*/
/* 	    <script src="{{ asset_url }}"></script>*/
/* 	{% endjavascripts %}*/
/* 	<!-- Include all JavaScripts, compiled by Assetic -->*/
/* 	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>*/
/* </body>*/
/* */
/* </html>*/
