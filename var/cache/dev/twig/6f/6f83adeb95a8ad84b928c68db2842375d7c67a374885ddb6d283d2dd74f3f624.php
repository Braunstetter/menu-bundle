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

/* @Menu/breadcrumb_menu_blocks.html.twig */
class __TwigTemplate_cb72583f1f22b21397b6fc8b4d9b91994a04ee9aa55bdfa5613296f92a168536 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'menu' => [$this, 'block_menu'],
            'item' => [$this, 'block_item'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Menu/breadcrumb_menu_blocks.html.twig"));

        // line 1
        $this->displayBlock('menu', $context, $blocks);
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('item', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 2
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "inActiveTrail", [], "any", false, false, false, 2) || twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "current", [], "any", false, false, false, 2))) {
            // line 3
            echo "        ";
            $this->displayBlock("item", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_item($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item"));

        // line 8
        echo "    ";
        $context["path"] = ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 8, $this->source); })()), "routeParameters", [], "any", false, false, false, 8)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 8, $this->source); })()), "routeName", [], "any", false, false, false, 8), twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 8, $this->source); })()), "routeParameters", [], "any", false, false, false, 8))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 8, $this->source); })()), "routeName", [], "any", false, false, false, 8))));
        // line 9
        echo "    ";
        $context["label"] = twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 9, $this->source); })()), "label", [], "any", false, false, false, 9);
        // line 10
        echo "    ";
        $context["handle"] = twig_lower_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 10, $this->source); })()));
        // line 11
        echo "    ";
        $context["selectedSubnavItem"] = ((array_key_exists("selectedSubnavItem", $context)) ? (_twig_default_filter((isset($context["selectedSubnavItem"]) || array_key_exists("selectedSubnavItem", $context) ? $context["selectedSubnavItem"] : (function () { throw new RuntimeError('Variable "selectedSubnavItem" does not exist.', 11, $this->source); })()), null)) : (null));
        // line 12
        echo "
    ";
        // line 13
        $context["current"] = (((isset($context["selectedSubnavItem"]) || array_key_exists("selectedSubnavItem", $context) ? $context["selectedSubnavItem"] : (function () { throw new RuntimeError('Variable "selectedSubnavItem" does not exist.', 13, $this->source); })()) === (isset($context["handle"]) || array_key_exists("handle", $context) ? $context["handle"] : (function () { throw new RuntimeError('Variable "handle" does not exist.', 13, $this->source); })())) || twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 13, $this->source); })()), "current", [], "any", false, false, false, 13));
        // line 14
        echo "    ";
        $context["inActiveTrail"] = twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 14, $this->source); })()), "inActiveTrail", [], "any", false, false, false, 14);
        // line 15
        echo "
    <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 16, $this->source); })()), "html", null, true);
        echo "\"
       ";
        // line 17
        if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 17, $this->source); })()) || (isset($context["inActiveTrail"]) || array_key_exists("inActiveTrail", $context) ? $context["inActiveTrail"] : (function () { throw new RuntimeError('Variable "inActiveTrail" does not exist.', 17, $this->source); })()))) {
            echo "class=\"active ";
            echo (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 17, $this->source); })())) ? ("current") : (""));
            echo "\"";
        }
        // line 18
        echo "    >

        <span>";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 20, $this->source); })()), "html", null, true);
        echo "</span>
        ";
        // line 21
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 21, $this->source); })()), "children", [], "any", false, false, false, 21))) {
            // line 22
            echo "            ";
            echo twig_source($this->env, "@Menu/svg/caret.svg");
            echo "
        ";
        }
        // line 24
        echo "    </a>

    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["entry"], "children", [], "any", false, false, false, 26));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 27
            echo "        ";
            $this->displayBlock("menu", $context, $blocks);
            echo "
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Menu/breadcrumb_menu_blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  152 => 27,  135 => 26,  131 => 24,  125 => 22,  123 => 21,  119 => 20,  115 => 18,  109 => 17,  105 => 16,  102 => 15,  99 => 14,  97 => 13,  94 => 12,  91 => 11,  88 => 10,  85 => 9,  82 => 8,  75 => 7,  64 => 3,  61 => 2,  54 => 1,  47 => 7,  44 => 6,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block menu %}
    {% if entry.inActiveTrail or entry.current %}
        {{ block('item') }}
    {% endif %}
{% endblock %}

{% block item %}
    {% set path = entry.routeParameters ? path(entry.routeName, entry.routeParameters) : path(entry.routeName) %}
    {% set label = entry.label %}
    {% set handle = label|lower %}
    {% set selectedSubnavItem = selectedSubnavItem|default(null) %}

    {% set current = selectedSubnavItem is same as handle or entry.current %}
    {% set inActiveTrail = entry.inActiveTrail %}

    <a href=\"{{ path }}\"
       {% if current or inActiveTrail %}class=\"active {{ current ? 'current' }}\"{% endif %}
    >

        <span>{{ label }}</span>
        {% if entry.children is not empty %}
            {{ source('@Menu/svg/caret.svg') }}
        {% endif %}
    </a>

    {% for entry in entry.children %}
        {{ block('menu') }}
    {% endfor %}
{% endblock %}", "@Menu/breadcrumb_menu_blocks.html.twig", "/Users/michaelbrauner/Bundles/Symfony/MenuBundle/src/Resources/views/breadcrumb_menu_blocks.html.twig");
    }
}
