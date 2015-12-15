{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:ctrl.filterInput';

    //Keep the identifying property
    $id = '';
    foreach($fields as $fieldId => $field) {
        if(isset($field['filterable']) && $field['filterable']) 
            $filter .= ":'" . $fieldId . "'";
        if(isset($field['isId']) && $field['isId'])
            $id = $fieldId;
    }
    $filter .= ' track by elem.' . $id;

    //And we compute the name for each tr form because nested {{}} are horrible
    $form_name = 'form_{{elem.' . $id . '}}';
?>

<h2>{{$title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl" <? echo((isset($adaptToContent) && $adaptToContent) ? ' class="adapt-to-content"' : ''); ?>>
    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="form-control" />
    <form name="mainForm" novalidate>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                {{-- Configured Headers --}}
                @foreach($fields as $fieldId => $field)
                    @if($field['sortable'])
                        <th class="clickable {{$field['tdClass'] or ''}}">
                            <my-sortable-header set="ctrl.setSort('{{$fieldId}}')"
                                                get="ctrl.getSort('{{$fieldId}}')"
                            >
                            {{$field['label']}}
                        </th>
                    @else
                        <td><span>{{$field['label']}}</span></td>
                    @endif
                @endforeach
                {{-- action headers --}}
                <td><!--Edit--></td>
                <td><!--Delete--></td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="elem in ctrl.data | {{$filter}}" ng-form="ctrl.form_@{{$index}}">
                {{-- Each field --}}
                @foreach($fields as $fieldId => $field)
                    <td class="validated {{$field['tdClass'] or ''}}">
                        @if($field['editable'])
                            @include('components.myEditable', [
                                'controllerName' => 'ctrl',
                                'element' => 'elem',
                                'editingFlag' => 'elem.editing',
                                'fieldId' => $fieldId,
                                'field' => $field
                            ])
                        @else
                            <span {{$field['additionalAttributes'] or ''}}>@{{elem.{{$fieldId}}}}</span>
                        @endif
                    </td>
                @endforeach
                {{-- action columns --}}
                <td>
                    <span ng-hide="elem.editing" ng-click="elem.editing = true" class="glyphicon glyphicon-edit clickable"></span>
                    <span ng-show="elem.editing" ng-click="ctrl.editSubmit($index, elem)" class="glyphicon glyphicon-ok clickable"></span>
                </td>
                <td>
                    <span ng-hide="elem.editing" ng-click="ctrl.delete(elem)" class="glyphicon glyphicon-trash clickable"></span>
                    <span ng-show="elem.editing" ng-click="ctrl.cancel(elem)"class="glyphicon glyphicon-remove clickable"></span>
                </td>
            </tr>

            {{-- Add line --}}
            <tr ng-form="ctrl.form_add">
                @foreach($fields as $fieldId => $field)
                    <td class="validated {{$field['tdClass'] or ''}}">
                        @if($field['addLine'])
                            @include('components.myEditable', [
                                'controllerName' => 'ctrl',
                                'element' => 'addObject',
                                'editingFlag' => 'true',
                                'fieldId' => $fieldId,
                                'field' => $field
                            ])
                        @endif
                    </td>
                @endforeach
                <td class="centered">
                    <span ng-click="ctrl.addSubmit()" class="glyphicon glyphicon-plus clickable"></span>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </form>
</div>