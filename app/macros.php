<?php

Form::macro('cmsField', function ($for, $label, $input, $classes = '', array $option = []) {
    if (isset($option['info'])) {
        $info = $option['info'];
    }
    $infoValue = isset($info) ? '<span class="help-block">' . $info . '</span>' : '';

    $labelId = generateId($for);
    $labelValue = ($label !== null) ? $label : '';

    $result = "
        <div class=\"form-group\">
            <div class=\"row\">
                <label class=\"col-md-2\" for=\"$labelId\">$labelValue</label>
                <div class=\"col-md-10 $classes \">
                  $input
                  $infoValue
                </div>
            </div>
        </div>";

    if (isset($option['thumbnail'])) {
        $url = $option['thumbnail'];
        $result .= "
            <div class=\"row\">
                <div class=\"col-md-offset-2 col-xs-6 col-md-3\">
                    <a href=\"$url\" target=\"_blank\" class=\"thumbnail\">
                      <img src=\"$url\" alt=\"$url\">
                    </a>
                </div>
            </div>
        ";
    }
    return $result;
});

Form::macro('cmsText', function ($name, $label, $value = null, $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Enter $label", $attributes, true);

    return Form::cmsField($name, $label, Form::text($name, $value, $attributes), '', $attributes);
});

Form::macro('cmsNumber', function ($name, $label, $value = null, $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Enter $label", $attributes, true);

    return Form::cmsField($name, $label, Form::input('number', $name, $value, $attributes), '', $attributes);
});

Form::macro('cmsTextarea', function ($name, $label, $value = null, $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Enter $label", $attributes, true);
    addStringToArray('rows', 5, $attributes, true);

    return Form::cmsField($name, $label, Form::textarea($name, $value, $attributes), '', $attributes);
});

Form::macro('cmsPassword', function ($name, $label, $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Enter $label", $attributes, true);

    return Form::cmsField($name, $label, Form::password($name, $attributes), '', $attributes);
});

Form::macro('cmsStatic', function ($label, $value = null, $attributes = []) {
    $name = lcfirst($label);

    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);

    $input = "<p>$value</p>";

    return Form::cmsField($name, $label, $input, '', $attributes);
});

Form::macro('cmsSelect', function ($name, $label, $lists = [], $placeholder, $value = null, $attributes = []) {
    addStringToArray('id', generateId($name), $attributes, true);
    addStringToArray('class', 'form-control select2me', $attributes);
    addStringToArray('data-placeholder', $placeholder, $attributes, true);

    if (!empty($attributes['data-placeholder'])) {
        $lists = ['' => $attributes['data-placeholder']] + $lists;
    }

    return Form::cmsField($name, $label, Form::select($name, $lists, $value, $attributes), '', $attributes);
});

Form::macro(
    'cmsMultiSelect',
    function ($name, $label, $lists = [], $placeholder = null, $value = null, $attributes = []) {
        $attributes['multiple'] = true;
        return \Form::cmsSelect($name, $label, $lists, $placeholder, $value, $attributes);
    }
);

Form::macro('cmsRadio', function ($name, $label, $list = [], $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);

    if (!empty($list)) {
        $input = "";
        $count = 1;
        foreach ($list as $value => $valueName) {
            $radio = Form::radio($name, $value, false, ['id' => $name . $count]);
            $input .= "
                <div class=\"radio\">
                    <label>
                        $radio $valueName
                    </label>
                </div>
            ";
            $count++;
        }
    }

    return Form::cmsField($name, $label, $input, '', $attributes);
});

Form::macro('cmsCheckboxes', function ($name, $label, $list = [], $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);

    if (!empty($list)) {
        $input = "";
        $count = 1;
        foreach ($list as $value => $valueName) {
            $checkbox = Form::checkbox($name, $value, false, ['id' => $name . $count]);
            $input .= "
                <div class=\"checkbox\">
                    <label>
                        $checkbox $valueName
                    </label>
                </div>
            ";
            $count++;
        }
    }

    return Form::cmsField($name, $label, $input, '', $attributes);
});

Form::macro('cmsSubmit', function ($value = null, $name = null, $attributess = []) {
    addStringToArray('class', 'btn btn-success', $attributes);
    return Form::input('submit', $name, $value, $attributes);
});

\Form::macro('cmsReset', function ($value = null, $attributess = []) {
    addStringToArray('class', 'btn btn-warning', $attributes);
    return Form::reset($value, $attributes);
});

Form::macro('cmsPreview', function ($value = null, $name = null, $attributess = []) {
    $name = $name ? $name : 'Preview';
    $value = $value ? $value : '#';
    return "
        <a href=\"$value\" class=\"btn btn-primary\">$name</a>
    ";
});

Form::macro('cmsModel', function ($model, array $attributes = []) {
    addStringToArray('class', 'form-horizontal', $attributes);

    if (isset($attributes['prefix'])) {
        $attributes['route'] = $model->exists
            ? [cmsRouteName($attributes['prefix'] . '.update'), $model]
            : cmsRouteName($attributes['prefix'] . '.store');
        unset($attributes['prefix']);
    }

    if (!isset($attributes['method'])) {
        $attributes['method'] = $model->exists ? 'PUT' : 'POST';
    }

    return Form::model($model, $attributes);
});

Form::macro('cmsWysiwyg', function ($name, $label, $value = null, $type = 'basic', $attributes = []) {
    addStringToArray('class', "editor", $attributes);
    if (!isset($attributes['rows'])) {
        $attributes['rows'] = 15;
    }
    return Form::cmsTextarea($name, $label, $value, $attributes);
});
