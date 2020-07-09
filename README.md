#### Icon Awefont List

-   Delete icon:
    <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('categories.destroy',[$category->id]) }}')">
    <span><i class="fas fa-trash-alt"></i> Delete</span>
    </button>
-   Edit icon:
    <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-sm btn-primary">
    <span><i class="far fa-edit"></i> Edit</a></span>
-   Detail icon:
    <a href="{{ route('categories.show',[$category->id]) }}" class="btn btn-sm btn-info">
    <span><i class="fas fa-info-circle"></i> Detail</span></a>
-   Save icon btn:
    <button type="submit" class="btn btn-success">
    <span> <i class="fas fa-save"></i> Save </span>
    </button>
-   Back icon btn:
    <button type="button" class="btn btn-dark" onclick="window.history.back()">
    <span> <i class="fas fa-arrow-left"></i> Back</span>
    </button>
