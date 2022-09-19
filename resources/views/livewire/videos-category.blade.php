<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Video Categories') }}</h3>
    </div>
    <div class="card-body">

        <x-admin.category.table-button
            :route="'videos-category'"
            :title="'Create Video Category'"/>

        <x-admin.category.table
            :params="$videos"
            :categories="$videosParent"
            :users="$users"
            :route="'videos-category'"/>

    </div>
</div>
