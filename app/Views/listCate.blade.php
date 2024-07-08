<a class="bn" href="addCate">ADD</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
           @foreach($cate as $key => $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['name_category'] }}</td>
                    <td>
                        <a class="bn" href="index.php?url=updateCategory&id_cate={{ $value['id'] }}">Sửa</a>
                        <a  class="bn" href="index.php?url=deleteCategory&id_cate={{ $value['id'] }}">Xóa</a>
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>
    <style>
table{
    width: 100%;
    border-collapse: collapse;
}

table th{
    border-bottom: solid 2px black;
    padding: 3px;
}

table td{
    padding: 2px;
    border: solid 1px gray;
}

table tbody tr:hover{
    background-color: antiquewhite;
}

.bn{
    border: none;
    background: orange;
    color: white;
    padding: 1px 4px ;
    cursor: pointer;
    transition: background 1s;
}

.bn:hover{
    background-color: yellow;
}
    </style>