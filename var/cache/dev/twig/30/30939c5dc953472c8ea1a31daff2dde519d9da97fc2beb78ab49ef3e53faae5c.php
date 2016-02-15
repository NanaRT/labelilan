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
        $__internal_fb9d28c30fd96e8c32b8c94ae912e6cf317554eeda16fc8d029edf97ea6f6008 = $this->env->getExtension("native_profiler");
        $__internal_fb9d28c30fd96e8c32b8c94ae912e6cf317554eeda16fc8d029edf97ea6f6008->enter($__internal_fb9d28c30fd96e8c32b8c94ae912e6cf317554eeda16fc8d029edf97ea6f6008_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
            // asset "ccca1cb_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_0") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_1.js");
            // line 127
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_1") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_1_bootstrap-datepicker_1_2.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_2") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_1_bootstrap.min_3_3.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_3") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_1_bootstrap_2_4.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_4") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_1_custom_4_5.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_5") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_1_6.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_6") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_1_bootstrap-datepicker_1_2_7.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_7") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_1_bootstrap.min_3_3_8.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_8") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_1_bootstrap_2_4_9.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_9") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_1_custom_4_5_10.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_10") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_2_35a8e64_1_6_11.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_11") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_2_35a8e64_comments_1_2_7_12.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_12") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_048c425_part_2_jquery.min_3_8_13.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_13") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_35a8e64_1_14.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_14") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_35a8e64_9_15.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_15") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_35a8e64_comments_1_10_16.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_16") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_35a8e64_comments_1_2_17.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_17"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_17") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_jquery.min_11_18.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_18"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_18") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_048c425_part_2_jquery.min_3_19.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_19"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_19") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_35a8e64_20.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_20"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_20") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_35a8e64_comments_1_21.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
            // asset "ccca1cb_21"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb_21") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb_part_1_jquery.min_22.js");
            echo "\t    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "ccca1cb"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ccca1cb") : $this->env->getExtension('asset')->getAssetUrl("js/ccca1cb.js");
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
        
        $__internal_fb9d28c30fd96e8c32b8c94ae912e6cf317554eeda16fc8d029edf97ea6f6008->leave($__internal_fb9d28c30fd96e8c32b8c94ae912e6cf317554eeda16fc8d029edf97ea6f6008_prof);

    }

    // line 18
    public function block_title($context, array $blocks = array())
    {
        $__internal_6468c7564e463f8dd68ad71d63885ac109d9c5e9b1f8d8f1570e92f8f6f59954 = $this->env->getExtension("native_profiler");
        $__internal_6468c7564e463f8dd68ad71d63885ac109d9c5e9b1f8d8f1570e92f8f6f59954->enter($__internal_6468c7564e463f8dd68ad71d63885ac109d9c5e9b1f8d8f1570e92f8f6f59954_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Label[i] Gaming Championship";
        
        $__internal_6468c7564e463f8dd68ad71d63885ac109d9c5e9b1f8d8f1570e92f8f6f59954->leave($__internal_6468c7564e463f8dd68ad71d63885ac109d9c5e9b1f8d8f1570e92f8f6f59954_prof);

    }

    // line 104
    public function block_body($context, array $blocks = array())
    {
        $__internal_bf44771f01bd2e2aea942089d0681d2c942120a354fca9e62cde13c34dc07b72 = $this->env->getExtension("native_profiler");
        $__internal_bf44771f01bd2e2aea942089d0681d2c942120a354fca9e62cde13c34dc07b72->enter($__internal_bf44771f01bd2e2aea942089d0681d2c942120a354fca9e62cde13c34dc07b72_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 105
        echo "    ";
        
        $__internal_bf44771f01bd2e2aea942089d0681d2c942120a354fca9e62cde13c34dc07b72->leave($__internal_bf44771f01bd2e2aea942089d0681d2c942120a354fca9e62cde13c34dc07b72_prof);

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
        return array (  398 => 105,  392 => 104,  380 => 18,  369 => 130,  366 => 129,  226 => 127,  222 => 126,  217 => 124,  197 => 106,  195 => 104,  186 => 97,  177 => 91,  168 => 85,  165 => 84,  156 => 78,  147 => 72,  144 => 71,  142 => 70,  135 => 65,  127 => 62,  117 => 58,  113 => 57,  110 => 56,  106 => 55,  100 => 52,  96 => 50,  92 => 49,  85 => 45,  60 => 23,  56 => 22,  52 => 21,  46 => 18,  42 => 17,  24 => 1,);
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
/*     {% javascripts 'js/*' %}*/
/* 	    <script src="{{ asset_url }}"></script>*/
/* 	{% endjavascripts %}*/
/* 	<!-- Include all JavaScripts, compiled by Assetic -->*/
/* 	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>*/
/* </body>*/
/* */
/* </html>*/
