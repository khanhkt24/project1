<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
    <button><a href="webUser">Quay về trang chủ</a></button>
    <?php 
    if($_SESSION['user']['role']==0){
    echo "Trang admin";
}
?>
<br>
<a class="bn" href="addPro">ADD</a>
    <table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
           @foreach($pro as $key => $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td><img src="{{ $value['image'] }}" alt="Hình ảnh sản phẩm 1" style="max-width: 100px;"></td>
                    <td>{{ $value['price'] }}</td>
                    <td>{{ $value['name_category'] }}</td>
                    <td>
                        <a class="bn" href="index.php?url=updateProduct&id={{ $value['id'] }}">Sửa</a>
                        <a class="bn" href="index.php?url=deleteProduct&id={{ $value['id'] }}">Xóa</a>
                    </td>        
                </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>


 