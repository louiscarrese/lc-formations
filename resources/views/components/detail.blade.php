<h2>{{<?php echo($controller); ?>.titleText}}</h2>

<div class="alerts">
    <uib-alert type="danger" close="{{$controller}}.closeAlert($index)" ng-repeat="error in {{$controller}}.errors">@{{error}}</uib-alert>
</div>

<form name="{{$controller}}.mainForm" novalidate class="form-horizontal form-condensed row">
    @foreach($fields as $fieldId => $field)
        <div class="form-group" ng-class="{ 'has-error': {{$controller}}.mainForm.{{$fieldId}}.$invalid && {{$controller}}.mainForm.{{$fieldId}}.$touched }">
            <label class="control-label col-sm-{{$field['sizeLabel']}}">{{$field['label']}}</label>
            <div class="col-sm-{{$field['sizeValue']}} detail-value">
                @if(isset($field['readonly']) && $field['readonly'])
                    <p class="editable-read"><? echo '{{' . $controller . '.data.' . $fieldId . '}}' ?></p>
                @else
                        @include('components.myEditable', [
                            'controllerName' => $controller,
                            'element' => $controller . '.data',
                            'editingFlag' => $controller . '.editing',
                            'field' => $field
                        ])
                @endif
            </div>
        </div>
    @endforeach
    <div class="global-actions pull-right">
        <span ng-show="{{$controller}}.mode === 'read'" ng-click="{{$controller}}.setModeEdit()" class="clickable glyphicon glyphicon-edit"></span>
        <span ng-show="{{$controller}}.mode === 'create'" ng-click="{{$controller}}.create()" class="clickable glyphicon glyphicon-ok"></span>
        <span ng-show="{{$controller}}.mode === 'edit'" ng-click="{{$controller}}.update()" class="clickable glyphicon glyphicon-ok"></span>
        <span ng-show="{{$controller}}.mode === 'edit'" ng-click="{{$controller}}.cancel()" class="clickable glyphicon glyphicon-remove"></span>
        <span ng-show="{{$controller}}.mode !== 'create'" ng-click="{{$controller}}.delete()" class="clickable glyphicon glyphicon-trash"></span>
    </div>
</form>
