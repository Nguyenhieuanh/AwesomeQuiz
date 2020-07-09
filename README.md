#### Icon Awefont List

-   Delete icon:
    <button class="btn btn-sm btn-danger"onclick="confirmDelete('{{ route('categories.destroy',[$category->id]) }}')">
    <span><i class="fas fa-trash-alt"></i> Delete</span></button>
-   Edit icon:
    <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-sm btn-info">
    <span><i class="far fa-edit"></i> Edit</a></span>
- Detail icon:

