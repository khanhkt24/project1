<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
   <style>
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
    .bn{
            border: none;
            background: orange;
            color: white;
            padding: 3px 6px ;
            cursor: pointer;
            transition: background 1s;
        }

        .bn:hover{
            background-color: yellow;
        }
   </style>
</head>
<body>
<form action="addPro" method="post" enctype="multipart/form-data">
    <div class="">
        <label for="">Nhập tên sản phẩm</label>
        <input type="text" name="name">
    </div>

   <div> <label for="">Nhập hình ảnh</label>
    <input type="file" name="image"></div>

  <div><label for="">Nhập giá</label>
      <input type="number" name="price"></div>


    <div>
        <label for="">Chọn danh mục</label>
        <select name="id_category" id="id_category">
            @foreach($cate as $ValueCT)
                <option value="{{$ValueCT['id']}}"> {{$ValueCT['name_category']}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" name="submit">Thêm</button>
</form>
</body>
</html>