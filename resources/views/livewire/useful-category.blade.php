<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Useful Categories') }}</h3>
    </div>
    <div class="card-body">
        <x-admin.category.table-button :route="'useful-category'" :title="'Create Useful Category'"/>
        <x-admin.category.table :params="$usefuls" :categories="$usefulParent" :users="$users"
                               :route="'useful-category'"/>
    </div>
</div>
