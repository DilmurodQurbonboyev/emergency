<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Page Categories') }}</h3>
    </div>
    <div class="card-body">
        <x-admin.category.table-button :route="'pages-category'" :title="'Create Page Category'"/>
        <x-admin.category.table :params="$pages" :categories="$pagesParent" :users="$users" :route="'pages-category'"/>
    </div>
</div>
