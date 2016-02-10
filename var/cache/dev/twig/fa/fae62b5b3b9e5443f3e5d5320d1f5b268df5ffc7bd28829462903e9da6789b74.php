<?php

/* AppBundle:game:show.html.twig */
class __TwigTemplate_dc567236ce4f06ac1bd1177a6b30589d3cec653ff88d881af9693799dcd5c25b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "AppBundle:game:show.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_80f751098d26e96263a99db7c337fb92be73d28aade9cffd8ee9349bede9ef0e = $this->env->getExtension("native_profiler");
        $__internal_80f751098d26e96263a99db7c337fb92be73d28aade9cffd8ee9349bede9ef0e->enter($__internal_80f751098d26e96263a99db7c337fb92be73d28aade9cffd8ee9349bede9ef0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:game:show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_80f751098d26e96263a99db7c337fb92be73d28aade9cffd8ee9349bede9ef0e->leave($__internal_80f751098d26e96263a99db7c337fb92be73d28aade9cffd8ee9349bede9ef0e_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_299409817340a7151789c2d7fb2f1c5d8864f76f00f8bbe30e1325d19bab2827 = $this->env->getExtension("native_profiler");
        $__internal_299409817340a7151789c2d7fb2f1c5d8864f76f00f8bbe30e1325d19bab2827->enter($__internal_299409817340a7151789c2d7fb2f1c5d8864f76f00f8bbe30e1325d19bab2827_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"container\">
        <div class=\"row\">
            <!-- Blog Post Content Column -->
            <div class=\"col-lg-8\">
                <h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "name", array()), "html", null, true);
        echo "</h1>
                <p class=\"lead\">
                    organisé par <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("organizer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "organizer", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "organizer", array()), "name", array()), "html", null, true);
        echo "</a>
                </p>
                <hr>
                <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((("bundles/app/img/game/" . $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "systName", array())) . ".png")), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "name", array()), "html", null, true);
        echo "\" class=\"img-responsive\" >
                <hr>
                <p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>

                <!-- Comment -->
                <div class=\"media\">
                    ";
        // line 25
        $this->loadTemplate("FOSCommentBundle:Thread:async.html.twig", "AppBundle:game:show.html.twig", 25)->display(array_merge($context, array("id" => "foo")));
        // line 26
        echo "                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class=\"col-md-4\">

                <!-- Blog Search Well -->
                <div class=\"well\">
                    <h4>Blog Search</h4>
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\">
                        <span class=\"input-group-btn\">
                            <button class=\"btn btn-default\" type=\"button\">
                                <span class=\"glyphicon glyphicon-search\"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class=\"well\">
                    <h4>Blog Categories</h4>
                    <div class=\"row\">
                        <div class=\"col-lg-6\">
                            <ul class=\"list-unstyled\">
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class=\"col-lg-6\">
                            <ul class=\"list-unstyled\">
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                                <li><a href=\"#\">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class=\"well\">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

    </div>

\t";
        // line 89
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 90
            echo "        ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start');
            echo "
            <input type=\"submit\" value=\"Delete\">
        ";
            // line 92
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
            echo "
    ";
        }
        // line 94
        echo "    
";
        
        $__internal_299409817340a7151789c2d7fb2f1c5d8864f76f00f8bbe30e1325d19bab2827->leave($__internal_299409817340a7151789c2d7fb2f1c5d8864f76f00f8bbe30e1325d19bab2827_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:game:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 94,  151 => 92,  145 => 90,  143 => 89,  78 => 26,  76 => 25,  59 => 13,  51 => 10,  46 => 8,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="container">*/
/*         <div class="row">*/
/*             <!-- Blog Post Content Column -->*/
/*             <div class="col-lg-8">*/
/*                 <h1>{{game.name}}</h1>*/
/*                 <p class="lead">*/
/*                     organisé par <a href="{{path('organizer_show', {'id':game.organizer.id}) }}">{{game.organizer.name}}</a>*/
/*                 </p>*/
/*                 <hr>*/
/*                 <img src="{{ asset('bundles/app/img/game/'~game.systName~'.png') }}" alt="{{game.name}}" class="img-responsive" >*/
/*                 <hr>*/
/*                 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>*/
/*                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>*/
/*                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>*/
/*                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>*/
/*                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>*/
/* */
/*                 <hr>*/
/* */
/*                 <!-- Comment -->*/
/*                 <div class="media">*/
/*                     {% include 'FOSCommentBundle:Thread:async.html.twig' with {'id': 'foo'} %}*/
/*                 </div>*/
/* */
/*             </div>*/
/* */
/*             <!-- Blog Sidebar Widgets Column -->*/
/*             <div class="col-md-4">*/
/* */
/*                 <!-- Blog Search Well -->*/
/*                 <div class="well">*/
/*                     <h4>Blog Search</h4>*/
/*                     <div class="input-group">*/
/*                         <input type="text" class="form-control">*/
/*                         <span class="input-group-btn">*/
/*                             <button class="btn btn-default" type="button">*/
/*                                 <span class="glyphicon glyphicon-search"></span>*/
/*                         </button>*/
/*                         </span>*/
/*                     </div>*/
/*                     <!-- /.input-group -->*/
/*                 </div>*/
/* */
/*                 <!-- Blog Categories Well -->*/
/*                 <div class="well">*/
/*                     <h4>Blog Categories</h4>*/
/*                     <div class="row">*/
/*                         <div class="col-lg-6">*/
/*                             <ul class="list-unstyled">*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                             </ul>*/
/*                         </div>*/
/*                         <div class="col-lg-6">*/
/*                             <ul class="list-unstyled">*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                                 <li><a href="#">Category Name</a>*/
/*                                 </li>*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/*                     <!-- /.row -->*/
/*                 </div>*/
/* */
/*                 <!-- Side Widget Well -->*/
/*                 <div class="well">*/
/*                     <h4>Side Widget Well</h4>*/
/*                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>*/
/*                 </div>*/
/* */
/*             </div>*/
/* */
/*     </div>*/
/* */
/* 	{% if is_granted("ROLE_ADMIN") %}*/
/*         {{ form_start(delete_form) }}*/
/*             <input type="submit" value="Delete">*/
/*         {{ form_end(delete_form) }}*/
/*     {%endif%}*/
/*     */
/* {% endblock %}*/
/* */
