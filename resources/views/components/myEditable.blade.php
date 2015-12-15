@if($field['type'] == 'text')
    <my-editable-text ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
@elseif($field['type'] == 'integer')
    <my-editable-integer ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
@elseif($field['type'] == 'radio')
    <my-editable-radio ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" values="{{$field['values']}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
@elseif($field['type'] == 'checkbox')
    <my-editable-checkbox ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
@elseif($field['type'] == 'textarea')
    <my-editable-textarea ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
@elseif($field['type'] == 'dropdown')
    <my-editable-dropdown ng-model="{{$element}}.{{$fieldId}}" editing-flag="{{$editingFlag}}" source="{{$controllerName}}.{{$field['dropdownDatasource']}}" source-id="{{$field['dropdownDataId']}}" source-label="{{$field['dropdownDataLabel']}}" model-label="{{$element}}.{{$field['dropdownLabel']}}" change="{{$field['change'] or '' }}" {{$field['additionalAttributes'] or ''}}></my-editable>
@endif
