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

/* @Menu/menu_blocks.html.twig */
class __TwigTemplate_33827dc62035e17b27ac5671754ff3b3002bbd2fab796669a3e60f39084b4523 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'item' => [$this, 'block_item'],
            'menu' => [$this, 'block_menu'],
            'section' => [$this, 'block_section'],
            'system' => [$this, 'block_system'],
            'icon' => [$this, 'block_icon'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Menu/menu_blocks.html.twig"));

        // line 1
        $this->displayBlock('item', $context, $blocks);
        // line 18
        echo "
";
        // line 19
        $this->displayBlock('menu', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('section', $context, $blocks);
        // line 42
        echo "
";
        // line 43
        $this->displayBlock('system', $context, $blocks);
        // line 48
        echo "
";
        // line 49
        $this->displayBlock('icon', $context, $blocks);
        // line 56
        echo "



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_item($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item"));

        // line 2
        echo "    ";
        $context["path"] = ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "routeParameters", [], "any", false, false, false, 2)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "routeName", [], "any", false, false, false, 2), twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "routeParameters", [], "any", false, false, false, 2))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 2, $this->source); })()), "routeName", [], "any", false, false, false, 2))));
        // line 3
        echo "    ";
        $context["label"] = twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 3, $this->source); })()), "label", [], "any", false, false, false, 3);
        // line 4
        echo "    ";
        $context["icon"] = twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 4, $this->source); })()), "icon", [], "any", false, false, false, 4);
        // line 5
        echo "    ";
        $context["handle"] = twig_lower_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 5, $this->source); })()));
        // line 6
        echo "    ";
        $context["selectedSubnavItem"] = ((array_key_exists("selectedSubnavItem", $context)) ? (_twig_default_filter((isset($context["selectedSubnavItem"]) || array_key_exists("selectedSubnavItem", $context) ? $context["selectedSubnavItem"] : (function () { throw new RuntimeError('Variable "selectedSubnavItem" does not exist.', 6, $this->source); })()), null)) : (null));
        // line 7
        echo "
    ";
        // line 8
        $context["current"] = (((isset($context["selectedSubnavItem"]) || array_key_exists("selectedSubnavItem", $context) ? $context["selectedSubnavItem"] : (function () { throw new RuntimeError('Variable "selectedSubnavItem" does not exist.', 8, $this->source); })()) === (isset($context["handle"]) || array_key_exists("handle", $context) ? $context["handle"] : (function () { throw new RuntimeError('Variable "handle" does not exist.', 8, $this->source); })())) || twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 8, $this->source); })()), "current", [], "any", false, false, false, 8));
        // line 9
        echo "    ";
        $context["inActiveTrail"] = twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 9, $this->source); })()), "inActiveTrail", [], "any", false, false, false, 9);
        // line 10
        echo "
    <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 11, $this->source); })()), "html", null, true);
        echo "\"
       ";
        // line 12
        if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 12, $this->source); })()) || (isset($context["inActiveTrail"]) || array_key_exists("inActiveTrail", $context) ? $context["inActiveTrail"] : (function () { throw new RuntimeError('Variable "inActiveTrail" does not exist.', 12, $this->source); })()))) {
            echo "class=\"active ";
            echo (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 12, $this->source); })())) ? ("underline") : (""));
            echo "\"";
        }
        // line 13
        echo "    >
        ";
        // line 14
        $this->displayBlock("icon", $context, $blocks);
        echo "
        ";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 15, $this->source); })()), "html", null, true);
        echo "
    </a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 19
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 20
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 20, $this->source); })()), "type", [], "any", false, false, false, 20) === twig_constant("Braunstetter\\MenuBundle\\Items\\MenuItem::TYPE_SYSTEM"))) {
            // line 21
            echo "        ";
            $this->displayBlock("system", $context, $blocks);
            echo "
    ";
        }
        // line 23
        echo "
    ";
        // line 24
        if ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 24, $this->source); })()), "type", [], "any", false, false, false, 24) === twig_constant("Braunstetter\\MenuBundle\\Items\\MenuItem::TYPE_SECTION"))) {
            // line 25
            echo "        ";
            $this->displayBlock("section", $context, $blocks);
            echo "
    ";
        }
        // line 27
        echo "
    ";
        // line 28
        if ((twig_get_attribute($this->env, $this->source, (isset($context["entry"]) || array_key_exists("entry", $context) ? $context["entry"] : (function () { throw new RuntimeError('Variable "entry" does not exist.', 28, $this->source); })()), "type", [], "any", false, false, false, 28) === twig_constant("Braunstetter\\MenuBundle\\Items\\MenuItem::TYPE_ROUTE"))) {
            // line 29
            echo "        ";
            $this->displayBlock("item", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 33
    public function block_section($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "section"));

        // line 34
        echo "    ";
        $this->displayBlock("item", $context, $blocks);
        echo "

    <div class=\"section\">
        ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["entry"], "children", [], "any", false, false, false, 37));
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
            // line 38
            echo "            ";
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
        // line 40
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 43
    public function block_system($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "system"));

        // line 44
        echo "    <div class=\"system\">
        ";
        // line 45
        $this->displayBlock("section", $context, $blocks);
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 49
    public function block_icon($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "icon"));

        // line 50
        echo "    ";
        if ((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 50, $this->source); })())) {
            // line 51
            echo "        ";
            echo twig_source($this->env, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 51, $this->source); })()));
            echo "
    ";
        } else {
            // line 53
            echo "        ";
            echo twig_source($this->env, "@Menu/svg/default_folder.svg");
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Menu/menu_blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  273 => 53,  267 => 51,  264 => 50,  257 => 49,  247 => 45,  244 => 44,  237 => 43,  229 => 40,  212 => 38,  195 => 37,  188 => 34,  181 => 33,  170 => 29,  168 => 28,  165 => 27,  159 => 25,  157 => 24,  154 => 23,  148 => 21,  145 => 20,  138 => 19,  128 => 15,  124 => 14,  121 => 13,  115 => 12,  111 => 11,  108 => 10,  105 => 9,  103 => 8,  100 => 7,  97 => 6,  94 => 5,  91 => 4,  88 => 3,  85 => 2,  78 => 1,  67 => 56,  65 => 49,  62 => 48,  60 => 43,  57 => 42,  55 => 33,  52 => 32,  50 => 19,  47 => 18,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block item %}
    {% set path = entry.routeParameters ? path(entry.routeName, entry.routeParameters) : path(entry.routeName) %}
    {% set label = entry.label %}
    {% set icon = entry.icon %}
    {% set handle = label|lower %}
    {% set selectedSubnavItem = selectedSubnavItem|default(null) %}

    {% set current = selectedSubnavItem is same as handle or entry.current %}
    {% set inActiveTrail = entry.inActiveTrail %}

    <a href=\"{{ path }}\"
       {% if current or inActiveTrail %}class=\"active {{ current ? 'underline' }}\"{% endif %}
    >
        {{ block('icon') }}
        {{ label }}
    </a>
{% endblock %}

{% block menu %}
    {% if entry.type is same as constant('Braunstetter\\\\MenuBundle\\\\Items\\\\MenuItem::TYPE_SYSTEM') %}
        {{ block('system') }}
    {% endif %}

    {% if entry.type is same as constant('Braunstetter\\\\MenuBundle\\\\Items\\\\MenuItem::TYPE_SECTION') %}
        {{ block('section') }}
    {% endif %}

    {% if entry.type is same as constant('Braunstetter\\\\MenuBundle\\\\Items\\\\MenuItem::TYPE_ROUTE') %}
        {{ block('item') }}
    {% endif %}
{% endblock %}

{% block section %}
    {{ block('item') }}

    <div class=\"section\">
        {% for entry in entry.children %}
            {{ block('menu') }}
        {% endfor %}
    </div>
{% endblock %}

{% block system %}
    <div class=\"system\">
        {{ block('section') }}
    </div>
{% endblock %}

{% block icon %}
    {% if icon %}
        {{ source(icon) }}
    {% else %}
        {{ source('@Menu/svg/default_folder.svg') }}
    {% endif %}
{% endblock %}




", "@Menu/menu_blocks.html.twig", "/Users/michaelbrauner/Bundles/Symfony/MenuBundle/src/Resources/views/menu_blocks.html.twig");
    }
}
