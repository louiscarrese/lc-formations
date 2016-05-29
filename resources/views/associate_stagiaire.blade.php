<div>
<h2>Association du stagiaire</h2>
<div class="association">
    <div class="left-column">        
        <h3>Préinscription</h3>
            {{-- 
        <div class="">
            @include('components.xeditable.radio', [
                'id' => 'sexe',
                'label' => 'Sexe',
                'model' => 'associateCtrl.preinscriptionData.sexe',
                'datasource' => '$scope.$parent.linkedData.sexe',
                'displayed' => '$scope.$parent.staticData.sexe.label($scope.$parent.data.sexe)',
                'inline' => true,
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'nom',
                'label' => 'Nom',
                'model' => '$scope.$parent.data.nom',
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'prenom',
                'label' => 'Prénom',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).prenom',
            ])
        </div>  
        *--}}
        <span>Nom : </span>
        <span>@{{associationCtrl.preinscriptionData.nom}}</span>
    </div>

    <div class="right-column">
        <h3>Base de données</h3>
        <div class="search">
            <form editable-form name="associationCtrl.searchForm" novalidate="novalidate">
                @include('components.xeditable.select', [
                    'id' =>'recherche',
                    'label' => 'Recherche',
                    'model' => 'associationCtrl.dbSearch',
                    'name' => 'dbSearch',
                    'displayed' => 'nom',
                    'match_displayed' => 'associationCtrl.searchMatchDisplayed($select.selected)',
                    'choices_displayed' => 'associationCtrl.searchChoicesDisplayed(item)',
                    'refresh' => 'associationCtrl.refreshList($select.search)',
                    'form' => 'associationCtrl.searchForm',
                    'datasource' => 'associationCtrl.dbSearchList',
                ])
            </form>
        </div>
        <div>
            <span>Search : </span>
            <span>@{{associationCtrl.dbSearch}}</span>
        </div>
{{--

        </div>
        <div class="">
            @include('components.xeditable.radio', [
                'id' => 'sexe',
                'label' => 'Sexe',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).sexe',
                'datasource' => '$scope.$parent.linkedData.sexe',
                'displayed' => '$scope.$parent.staticData.sexe.label($scope.$parent.data.sexe)',
                'inline' => true,
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'nom',
                'label' => 'Nom',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).nom',
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'prenom',
                'label' => 'Prénom',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).prenom',
            ])
        </div>  
        --}}
    </div>

    <!-- Needs to be after both floats so it aligns correctly -->
    <div class="center-column">
        &lt;&nbsp;&gt;
    </div>
</div>
<div>
    A footer, just to see
</div>
