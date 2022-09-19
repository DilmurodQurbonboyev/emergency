<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Photos Categories') }}</h3>
    </div>
    <div class="card-body">

        <x-admin.category.table-button
            :route="'photos-category'"
            :title="'Create Photo Category'"/>

        <x-admin.category.table
            :params="$photos"
            :categories="$photosParent"
            :users="$users"
            :route="'photos-category'"/>

    </div>
</div>
