{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:' . $controllerName . '.filterInput';

    //Keep the identifying property
    foreach($columns as $column) {
        foreach($column['fields'] as $fieldId => $field) {
            if(isset($field['filterable']) && $field['filterable'] != false) {
                $filterField = $field['filterable'] === true ? $fieldId : $field['filterable'];

                $filter .= ":'" . $filterField . "'";
            }
        }
    }
    $filter .= ' track by elem.' . $idField;

    if(!function_exists('generateErrorClass')) {
        function generateErrorClass($controllerName, $column) {
            $ret = '';
            $first = true;
            foreach($column['fields'] as $fieldId => $field) {
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
    }
?>

<h2>{{$title}}</h2>

<div <?php echo((isset($adaptToContent) && $adaptToContent) ? ' class="adapt-to-content"' : ''); ?>>

    <div class="alerts">
        <uib-alert type="danger" close="{{$controllerName}}.closeAlert($index)" ng-repeat="error in {{$controllerName}}.errors">@{{error}}</uib-alert>
    </div>

    <input type="text" ng-model="{{$controllerName}}.filterInput" placeholder="Recherche locale" class="form-control" />
    <form name="{{$controllerName}}.mainForm" novalidate>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                {{-- Configured Headers --}}
                @foreach($columns as $column)
                    @if($column['sortable'] != false)
                        <th class="clickable {{$column['tdClass'] or ''}} <?php echo (isset($column['size']) ? 'col-sm-' . $column['size'] : ''); ?>">
                            <my-sortable-header set="{{$controllerName}}.setSort('{{$column['sortable']}}')"
                                                get="{{$controllerName}}.getSort('{{$column['sortable']}}')"
                            >
                            {{$column['label']}}
                        </th>
                    @else
                        <th class="{{$column['tdClass'] or ''}} <?php echo (isset($column['size']) ? 'col-sm-' . $column['size'] : ''); ?>"><span>{{$column['label']}}</span></th>
                    @endif
                @endforeach
                {{-- action headers --}}
                <th><!--Edit--><!--Delete--></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="elem in {{$controllerName}}.data | {{$filter}}" ng-form="{{$controllerName}}.form_@{{$index}}">
                {{-- Each field --}}
                @foreach($columns as $column)
                    <td class="validated form-group {{$column['tdClass'] or ''}}" ng-class="{{generateErrorClass($controllerName, $column)}}">
                        @foreach($column['fields'] as $fieldId => $field)
                            @if($field['editable'])
                                @include('components.myEditable', [
                                    'controllerName' => $controllerName,
                                    'element' => 'elem',
                                    'editingFlag' => 'elem.editing',
                                    'fieldId' => $fieldId,
                                    'field' => $field
                                ])
                            @else
                                <span {{$field['additionalAttributes'] or ''}}>@{{elem.{{$fieldId}}}}</span>
                            @endif
                        @endforeach
                    </td>
                @endforeach
                {{-- action columns --}}
                <td class="list-action">
                    <button ng-if="!elem.editing" ng-click="elem.editing = true" class="btn btn-default ">
                        <span>Editer</span>
                    </button>
                    <button ng-if="elem.editing" ng-click="{{$controllerName}}.editSubmit($index, elem, {{$refreshControllers or 'null'}})" ng-class="{{$controllerName}}.getButtonClass($index)">
                        <span>Valider</span>
                    </button>
                    <button ng-if="!elem.editing" ng-click="{{$controllerName}}.delete(elem, {{$refreshControllers or 'null'}})" class="btn btn-default ">
                        <span>Supprimer</span>
                    </button>
                    <button ng-if="elem.editing" ng-click="{{$controllerName}}.cancel(elem)"class="btn btn-default ">
                        <span>Annuler</span>
                    </button>
                </td>
            </tr>

            {{-- Add line --}}
            <tr ng-form="{{$controllerName}}.form_add" novalidate >
                @foreach($columns as $column)
                    <td class="validated form-group {{$column['tdClass'] or ''}} {{generateErrorClass($controllerName, $column)}}">
                        @foreach($column['fields'] as $fieldId => $field)
                            @if($field['addLine'])
                                @include('components.myEditable', [
                                    'controllerName' => $controllerName,
                                    'element' => $controllerName . '.addObject',
                                    'editingFlag' => 'true',
                                    'fieldId' => $fieldId,
                                    'field' => $field
                                ])
                            @endif
                        @endforeach
                    </td>
                @endforeach
                <td class="list-action text-center">
                    <button ng-click="{{$controllerName}}.addSubmit({{$refreshControllers or 'null'}})" ng-class="{{$controllerName}}.getButtonClass('add')">
                        <span>Ajouter</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>