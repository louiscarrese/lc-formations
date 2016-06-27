{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    function generateErrorClassRow($controllerName, $row) {
        $ret = '';
        $first = true;
        foreach($row['fields'] as $fieldId => $field) {
            $angularId = $controllerName . '.form_{{$index}}.' . $fieldId;
            if($first) {
                $first = false;
            } else {
                $ret .= ' && ';
            }

            $ret .=  $angularId . '.$invalid';
            $ret .= ' && ' . $angularId . '.$touched ';
        }
        return $ret;
    }
?>
<h2>{{<?php echo($controller); ?>.titleText()}}</h2>

<div class="alerts">
    <uib-alert type="danger" close="{{$controller}}.closeAlert($index)" ng-repeat="error in {{$controller}}.errors">@{{error}}</uib-alert>
</div>

<form name="{{$controller}}.mainForm" novalidate class="form-horizontal form-condensed row">
    @foreach($rows as $row)
        <div class="form-group" ng-class="{ 'has-error': {{generateErrorClassRow($controller, $row)}} }">
            <label class="control-label col-sm-{{$sizeLabel}}">{{$row['label']}}</label>
            @foreach($row['fields'] as $fieldId => $field)
                <span class="col-sm-{{$field['sizeValue']}} detail-value">
                    @if(isset($field['readonly']) && $field['readonly'])
                        <?php echo '{{' . $controller . '.data.' . $fieldId . '}}' ?>
                    @elseif($field['type'] == 'raw')
                        {!! $viewService->displayedField($fieldId, $field['displayed'], $controller.'.data.') !!}
                    @else
                        @include('components.myEditable', [
                            'controllerName' => $controller,
                            'element' => $controller . '.data',
                            'editingFlag' => $controller . '.editing',
                            'field' => $field
                        ])
                    @endif
                </span>
            @endforeach
        </div>
    @endforeach
    <div class="global-actions">
        <button ng-if="{{$controller}}.mode === 'read'" ng-click="{{$controller}}.setModeEdit()" 
            class="btn btn-default">
            <span>Editer</span>
        </button>
        <button ng-if="{{$controller}}.mode === 'create'" ng-click="{{$controller}}.create()" ng-class="{{$controller}}.getButtonClass()">
            <span>Valider</span>
        </button>
        <button ng-if="{{$controller}}.mode === 'edit'" ng-click="{{$controller}}.update()" ng-class="{{$controller}}.getButtonClass()">
            <span>Valider</span>
        </button>
        <button ng-if="{{$controller}}.mode === 'edit'" ng-click="{{$controller}}.cancel()" class="btn btn-default">
            <span>Annuler</span>
        </button>
        <button ng-if="{{$controller}}.mode !== 'create'" ng-click="{{$controller}}.delete()" class="btn btn-default pull-right">
            <span>Supprimer</span>
        </button>
    </div>
</form>
