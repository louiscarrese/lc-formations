@if($field['type'] == 'text')
    <my-editable-text ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-text>
@elseif($field['type'] == 'integer')
    <my-editable-integer ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-integer>
@elseif($field['type'] == 'date')
    <my-editable-date ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" date-format={{$field['format']}} {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-date>
@elseif($field['type'] == 'time')
    <my-editable-time ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-time>
@elseif($field['type'] == 'radio')
    <my-editable-radio ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" values="{{$field['values']}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-radio>
@elseif($field['type'] == 'checkbox')
    <my-editable-checkbox ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-checkbox>
@elseif($field['type'] == 'textarea')
    <my-editable-textarea ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable-textarea>
@elseif($field['type'] == 'dropdown')
    <my-editable-dropdown ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" datasource="{{$controllerName}}.{{$field['datasource']}}" source-id="{{$field['dataId']}}" model-object="{{$element}}.{{$field['modelObject']}}" change="{{$field['change'] or '' }}" displayed="{{$field['displayed']}}" placeholder="{{$field['label']}}" {{$field['additionalAttributes'] or ''}}></my-editable-dropdown>
@elseif($field['type'] == 'multiselect')
    <my-editable-multiselect ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" datasource="{{$controllerName}}.{{$field['datasource']}}" source-id="{{$field['dataId']}}" model-objects="{{$element}}.{{$field['modelObjects']}}" displayed="{{$field['displayed']}}" placeholder="{{$field['placeholder']}}" {{$field['additionalAttributes'] or ''}}></my-editable-multiselect>
@endif
