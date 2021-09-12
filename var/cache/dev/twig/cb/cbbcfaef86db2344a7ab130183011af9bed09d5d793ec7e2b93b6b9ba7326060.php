<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* test.html.twig */
class __TwigTemplate_69fc9832c9a5dd27b269baf67a0b6a3f167c4026e7c0ed5acbe417667ca969b2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "test.html.twig"));

        // line 1
        if (array_key_exists("name", $context)) {
            // line 2
            echo "    ";
            echo call_user_func_array($this->env->getFunction('menu')->getCallable(), [$this->env, $context, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 2, $this->source); })())]);
            echo "
    ";
            // line 3
            echo call_user_func_array($this->env->getFunction('breadcrumbs')->getCallable(), [$this->env, $context, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 3, $this->source); })())]);
            echo "
";
        } else {
            // line 5
            echo "    ";
            echo call_user_func_array($this->env->getFunction('menu')->getCallable(), [$this->env, $context, "test_menu"]);
            echo "
    ";
            // line 6
            echo call_user_func_array($this->env->getFunction('breadcrumbs')->getCallable(), [$this->env, $context, "test_menu"]);
            echo "
";
        }
        // line 8
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "test.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 8,  57 => 6,  52 => 5,  47 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if name is defined %}
    {{ menu(name) }}
    {{ breadcrumbs(name) }}
{% else %}
    {{ menu('test_menu') }}
    {{ breadcrumbs('test_menu') }}
{% endif %}


", "test.html.twig", "/Users/michaelbrauner/Bundles/Symfony/MenuBundle/tests/app/src/Resources/views/test.html.twig");
    }
}
