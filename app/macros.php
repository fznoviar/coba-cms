<?php

Form::macro('cmsField', function ($for, $label, $input, $classes = '', array $option = []) {
    $errorName = str_replace('[', '.', $for);
    $errorName = str_replace(']', '', $errorName);
    $error = Session::has('errors') ? Session::get('errors')->first($errorName) : null;
    $isError = !empty($error);
    if (isset($option['info'])) {
        $info = $option['info'];
    }
    $infoValue = isset($info) ? '<span class="help-block">' . $info . '</span>' : '';
    $errorValue = $isError ? '<span class="text-danger">' . $error . '</span>' : '';

    $labelId = generateId($for);
    $labelValue = ($label !== null) ? $label : '';

    $result = "
        <div class=\"form-group\">
            <div class=\"row\">
                <label class=\"col-md-2\" for=\"$labelId\">$labelValue</label>
                <div class=\"col-md-10 $classes \">
                  $input
                  $infoValue
                  $errorValue
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

Form::macro('cmsEmail', function ($name, $label, $value = null, $attributes = []) {
    addStringToArray('id', generateID($name), $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Enter $label", $attributes, true);

    return Form::cmsField($name, $label, Form::email($name, $value, $attributes), '', $attributes);
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
            $checked = ($value == Form::getValueAttribute($name)) ? true : false;
            $checkbox = Form::checkbox($name, $value, $checked, ['id' => $name . $count]);
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

Form::macro('cmsOpen', function (array $attributes = []) {
    addStringToArray('class', 'form', $attributes);

    return Form::open($attributes);
});

Form::macro('cmsModel', function ($model, array $attributes = []) {
    addStringToArray('class', 'form', $attributes);

    if (isset($attributes['prefix'])) {
        $attributes['route'] = [$attributes['prefix'] . '.update', $model];
        unset($attributes['prefix']);
    }

    if (!isset($attributes['method'])) {
        $attributes['method'] ='PUT';
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

Form::macro('cmsFileBrowser', function ($name, $label, $value = null, $attributes = []) {
    $key = generateId($name);
    addStringToArray('id', $key, $attributes, true);
    addStringToArray('class', 'form-control', $attributes);
    addStringToArray('placeholder', "Browse from server or Enter Url.", $attributes, true);

    $inputText = Form::text($name, $value, $attributes);
    $input = "
        <div class=\"input-group\">
            <span class=\"input-group-btn popup_selector\" data-inputid=\"$key\" style=\"cursor:pointer;\">
                <button class=\"btn default\" type=\"button\"><i class=\"fa fa-folder-open-o\"></i></button>
            </span>
            $inputText
        </div>
    ";
    $value = Form::getValueAttribute($name, $value);

    if (!empty($value)) {
        $url = asset($value);
        $attributes['thumbnail'] = $url;
    }
    return Form::cmsField($name, $label, $input, '', $attributes);
});
