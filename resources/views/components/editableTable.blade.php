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

<div ng-controller="{{$controllerName}} as ctrl" class="list-table-container">
    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form name="mainForm" novalidate>
    <table>
        <thead>
            <tr>
                {{-- Configured Headers --}}
                @foreach($fields as $fieldId => $field)
                    @if($field['sortable'])
                        <td class="clickable">
                            <my-sortable-header set="ctrl.setSort('{{$fieldId}}')"
                                                get="ctrl.getSort('{{$fieldId}}')"
                            >
                            {{$field['label']}}
                        </td>
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
                            @if($field['type'] == 'text')
                                <my-editable type="text" ng-model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'integer')
                                <my-editable type="integer" ng-model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'checkbox')
                                <my-editable type="checkbox" ng-model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'dropdown')
                                <my-editable type="dropdown" ng-model="elem.{{$fieldId}}" editing-flag="elem.editing" source="ctrl.{{$field['dropdownDatasource']}}" source-id="{{$field['dropdownDataId']}}" source-label="{{$field['dropdownDataLabel']}}" model-label="elem.{{$field['dropdownLabel']}}" {{$field['additionalAttributes'] or ''}}></my-editable>
                            @endif
                        @else
                            <span {{$field['additionalAttributes'] or ''}}>@{{elem.{{$fieldId}}}}</span>
                        @endif
                    </td>
                @endforeach
                {{-- action columns --}}
                <td>
                    <span ng-hide="elem.editing" ng-click="elem.editing = true"><i class="icon clickable">edit</i></span>
                    <span ng-show="elem.editing" ng-click="ctrl.editSubmit($index, elem)"><i class="icon clickable">validate</i></span>
                </td>
                <td>
                    <span ng-hide="elem.editing" ng-click="ctrl.delete(elem)"><i class="icon clickable">delete</i></span>
                    <span ng-show="elem.editing" ng-click="ctrl.cancel(elem)"><i class="icon clickable">undo</i></span>
                </td>
            </tr>

            {{-- Add line --}}
            <tr ng-form="ctrl.form_add">
                @foreach($fields as $fieldId => $field)
                    <td class="validated {{$field['tdClass'] or ''}}">
                        @if($field['addLine'])
                            @if($field['type'] == 'text')
                                <my-editable type="text" ng-model="ctrl.addObject.{{$fieldId}}" editing-flag="true" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'integer')
                                <my-editable type="integer" ng-model="ctrl.addObject.{{$fieldId}}" editing-flag="true" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'checkbox')
                                <my-editable type="checkbox" ng-model="ctrl.addObject.{{$fieldId}}" editing-flag="true" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}}></my-editable>
                            @elseif($field['type'] == 'dropdown')
                                <my-editable type="dropdown" ng-model="ctrl.addObject.{{$fieldId}}" editing-flag="true" source="ctrl.{{$field['dropdownDatasource']}}" source-id="{{$field['dropdownDataId']}}" source-label="{{$field['dropdownDataLabel']}}" model-label="ctrl.addObject.{{$field['dropdownLabel']}}" {{$field['additionalAttributes'] or ''}}></my-editable>
                            @endif

                        @endif
                    </td>
                @endforeach
                <td class="centered">
                    <span ng-click="ctrl.addSubmit()"><i class="icon clickable">add</i></span>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>