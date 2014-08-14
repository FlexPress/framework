<?php

namespace FlexPress\Theme\Fields;

use FlexPress\Components\ACF\AbstractFieldProxy;

class FlexibleLayoutProxy extends AbstractFieldProxy
{

    /**
     *
     * Returns the string name for the field in your dic
     * this is the string value you have stored the field
     * under in the dic
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    protected function getDICName()
    {
        return "flexibleLayout";
    }
}