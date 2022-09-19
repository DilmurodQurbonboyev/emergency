
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ MessageService::tr('News Categories') }}</h3>
    </div>
    <div class="card-body">

        <x-admin.category.table-button
            :route="'news-category'"
            :title="'Create News Category'"/>

        <x-admin.category.table
            :params="$news"
            :categories="$newsParent"
            :users="$users"
            :route="'news-category'"/>

    </div>
</div>
