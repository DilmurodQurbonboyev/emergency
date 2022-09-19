<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Link Categories') }}</h3>
    </div>
    <div class="card-body">
        <x-admin.category.table-button :route="'links-category'" :title="'Create Link Category'" />
        <x-admin.category.table :params="$links" :categories="$linkParent" :users="$users" :route="'links-category'" />
    </div>
</div>
