<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Rest API</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Product</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="jumbotron">
            <h1 class="display-3">Product List</h1>
            <hr class="my-4">
            <h2>Add Product</h2>
            <form id="productForm">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="description" class="form-control"></textarea>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
            <hr>
            <ul class="list-group" id="products">

            </ul>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            getProducts();
            $('#productForm').on('submit', function(e){
                e.preventDefault();

                let name = $('#name').val();
                let description = $('#description').val();
                addProduct(name, description);
            });

            $('body').on('click', '.deleteLink', function(e){
              e.preventDefault();
              let id = $(this).data('id');
              deleteProduct(id);
            });

            function deleteProduct(id) {
              $.ajax({
                  method:'POST',
                  url:'http://103.66.177.142/APILaravel/api/products/' + id,
                  data:{_method: 'DELETE'}
              }).done(function(product){
                alert('Product deleted successfully');
                location.reload();
              });
            }

            function addProduct(name, description) {
              $.ajax({
                  method:'POST',
                  url:'http://103.66.177.142/APILaravel/api/products',
                  data:{name: name, description: description}
              }).done(function(product){
                alert('Product ' + product.id + ' added successfully');
                location.reload();
              });
            }
            
            function getProducts() {
                $.ajax({
                    url:'http://103.66.177.142/APILaravel/api/products'
                }).done(function(products){
                    let output = '';
                    $.each(products, function(key, product){
                        output += `
                            <li class="list-group-item">
                                <strong> ${product.name} : </strong> ${product.description} <a href="" class="deleteLink" data-id="${product.id}">Delete</a>
                            </li>
                        `;
                    });
                    $('#products').append(output);
                });
            }
        });
    </script>
</html>
