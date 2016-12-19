<?php namespace Bedard\Socialite\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Callback Form Widget
 */
class Callback extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    protected $defaultAlias = 'bedard_socialite_callback';

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('callback');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['url'] = url($this->formField->getConfig('url'));
        $this->vars['value'] = $this->getLoadValue();
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addCss('css/callback.css', 'Bedard.Socialite');
        $this->addJs('js/callback.js', 'Bedard.Socialite');
    }
}
