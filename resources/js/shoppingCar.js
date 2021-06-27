// Script para Carrito de compras


document.addEventListener("DOMContentLoaded", function() {
    /* VISIBILIDAD DEL CARRITO DE COMPRAS */

    // Modal de carrito de compras
    const modalShoppingCar = document.querySelector('#modalShoppingCar');
    // Boton para cerrar carrito de compras
    const shoppingCarButtonModalClose = document.querySelector('#shoppingCarButtonModalClose');

    // Seleccion los elementos que abren el modal de carrito, y les agrego el evento 'click'
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {
            // Hago visible el modal
            modalShoppingCar.style.display = 'block';

            // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
            brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');
            //  obtengo el contenedor donde se mostrara la marca seleccionada
            const containerBrandShoppingCar = document.getElementById('containerBrandShoppingCar');
            containerBrandShoppingCar.innerHTML = '';
            // Obtengo el componente card de ejemplo
            const cardBrandShoppingCar = document.getElementById('cardBrandShoppingCar');
            if( brandSelectedInBrandDetailView !== null ){
                // Llevo el string al formato JSON
                brandSelected = JSON.parse(brandSelectedInBrandDetailView);

                // creo un clon del card de ejemplo
                newCardBrandShoppingCar = cardBrandShoppingCar.firstElementChild.cloneNode(true);
                // Obtengo los campos del card  clonado
                let newTitle = newCardBrandShoppingCar.querySelector('#titleCardBrandShoppingCar');
                let newImage = newCardBrandShoppingCar.querySelector('#imgCardBrandShoppingCar');
                let newAddress = newCardBrandShoppingCar.querySelector('#addressCardBrandShoppingCar');
                // Asigno los valores del local storage a los campos html
                newTitle.textContent = brandSelected.title;
                newTitle.href = brandSelected.href;
                newImage.style.backgroundImage = brandSelected.image;
                newAddress.textContent = brandSelected.address;
                // Inserto el card en el modal
                containerBrandShoppingCar.appendChild(newCardBrandShoppingCar);

                // agrego el nombre de la tienda donde se esta comprando
                document.getElementById('titleBrandInShoppingCar').textContent = brandSelected.title;

                // Muestro la tienda
                document.getElementById('brandInShoppingCar').removeAttribute('hidden');

            }


            // Obtengo los productos del local storage
            ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            // Hay elementos en el carrito de compras?
            if(ProductsLocalStorage !== null) {
                // Llevo el string al formato JSON
                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
                // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
                localStorageProducts(arrayProductsLocalStorage);


                //  obtengo el contenedor donde se mostraran todos los productos del carrito
                const containerProductsShoppingCar = document.getElementById('containerProductsShoppingCar');
                containerProductsShoppingCar.innerHTML = '';
                // Obtengo el componente card de ejemplo
                const cardProductShoppingCar = document.getElementById('cardProductShoppingCar');

                arrayProductsLocalStorage.forEach(product => {
                    // creo un clon del card de ejemplo
                    newCardProductShoppingCar = cardProductShoppingCar.firstElementChild.cloneNode(true);
                    // Obtengo los campos del card  clonado
                    let newIdProductCardModalShoppingCar = newCardProductShoppingCar.querySelector('.idProductCardModalShoppingCar');
                    let newTitle = newCardProductShoppingCar.querySelector('.titleCardProductShoppingCar');
                    let newQuantity = newCardProductShoppingCar.querySelector('.quantityCardProductShoppingCar');
                    let newPrice = newCardProductShoppingCar.querySelector('.priceItemInShoppingCar');
                    let newImage = newCardProductShoppingCar.querySelector('.imgCardProductShoppingCar');
                    // Asigno los valores del local storage a los campos html
                    newIdProductCardModalShoppingCar.textContent = product.id;
                    newTitle.textContent = product.title;
                    newQuantity.textContent = product.quantity;
                    newImage.src = product.image;

                    // Si hay tienda seleccionada, debo colocar los precios de cada producto en esa tienda
                    if( brandSelectedInBrandDetailView !== null ){
                        newPrice.textContent = `${product.price} USD$`;
                    }


                    // Inserto el card en el modal
                    containerProductsShoppingCar.appendChild(newCardProductShoppingCar);
                });


            }


            // Eliminar la tienda donde se esta comprando
            const deleteBrandDetailInShoppingCar = document.getElementById('deleteBrandDetailInShoppingCar');

            if(deleteBrandDetailInShoppingCar !== null){
                deleteBrandDetailInShoppingCar.addEventListener('click', event => {
                    localStorage.removeItem('brandSelectedInBrandDetailView');
                    document.getElementById('brandInShoppingCar').setAttribute("hidden", true);

                    // verifico si hay produtos en el carrito
                    // Obtengo los productos del local storage
                    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                    if( ProductsLocalStorage !== null ){
                        arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                        if( arrayProductsLocalStorage.length < 1 ){
                            // cambio la url d el enlace en caso de tener el carrito vacio
                            document.getElementById('enlaceNoBrand').style.display = 'block';
                            document.getElementById('enlaceConBrand').style.display = 'none';

                        }else{
                            // Oculto los precios de cada producto en el modal de carrito de compras
                            const productInShoppingCarDOM = document.querySelectorAll('.priceItemInShoppingCar');
                            productInShoppingCarDOM.forEach(product => {
                                product.style.display = 'none';
                            });
                            // Actualizo las cantidades de los productos en el DOM, en la vista de la tienda

                            // Ahora verifico si estoy en la vista de la tienda que se acaba de eliminar,
                            let idProductsBrand = document.querySelectorAll('.idProductBrand');

                            if( idProductsBrand.length > 0 ){
                                // coloco todas las cantidades de los productos a cero, en el DOM
                                idProductsBrand.forEach(product => {

                                    product.parentElement.querySelector('.quantityProductDetail').textContent = 0

                                });

                            }
                        }
                    }

                })
            }


            updateAmount();


            // Finalizar compra, al dar click en el boton comprar
            const finalizarCompra = document.getElementById('finalizarCompra');
            finalizarCompra.addEventListener('click', event => {
                // alert("'asfsd")

                // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
                const brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');
                const brand = JSON.parse(brandSelectedInBrandDetailView);

                if (brandSelectedInBrandDetailView !== null) {

                    // Obtengo los productos del local storage
                    const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    const products = JSON.parse(ProductsLocalStorage);

                    // // Obtengo loa ubicacion del local storage
                    // const ubicationLocalStorage = localStorage.getItem('ubication');
                    // const ubication = JSON.parse(ubicationLocalStorage);


                    const amountSelected = localStorage.getItem('amount');
                    const amount = JSON.parse(amountSelected);

                    const itemsSelected = localStorage.getItem('itemsSelected');
                    const items = JSON.parse(itemsSelected);

                    const csrf_token = document.getElementById('csrf_token').textContent;

                    const data = {
                        products: products,
                        // ubication: ubication,
                        brand: brand,
                        amount: amount,
                        items: items
                    }

                    console.log(data)

                    // axios({
                    //     method  : 'POST',
                    //     url : '/post/create-order',
                    //     data : data,
                    //     headers: {
                    //         'content-type': 'application/json',
                    //         'X-CSRF-Token': csrf_token
                    //         }
                    // })
                    // .then((res)=>{
                    //     if(res.data === 0){
                    //         // El usuario no esta logeado, lo redirijo a la vista de login
                    //         window.location.href = "/login?r=1";
                    //     }else{
                    //         // elimino los datos del local storage
                    //         localStorage.removeItem('itemsSelected');
                    //         localStorage.removeItem('amount');
                    //         localStorage.removeItem('brandSelectedToBuy');
                    //         localStorage.removeItem('ubication');
                    //         localStorage.removeItem('productsShoppingCar');
                    //         // redirecciono a la vista compras
                    //         window.location.href = "/compras";
                    //     }

                    // })
                    // .catch((err) => {console.log(err)});

                }

            })
        });
    });

    // Ocultar el modal de carrito de compras
    shoppingCarButtonModalClose.addEventListener('click', function(){
        modalShoppingCar.style.display = 'none';
    });


    /* Agregar Productos al carrito desde la vista de detalles del producto */

    // Boton para agregar elementos al local Storage
    const addProduct = document.querySelector('#addProduct');
    const subtractProduct = document.querySelector('#subtractProduct');
    // Cantidad de productos en carrito, en vista de detalles de producto
    const quantityProductDetail = document.querySelector('#quantityProductDetail');

    if ( addProduct !== null ) {
        // Agregar producto
        addProduct.addEventListener('click', function(){
            // Obtengo los productos del local storage
            ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

            // Obtengo los datos del producto
            let quantity = parseInt(quantityProductDetail.textContent);
            // Tomo los valores del producto para agregarlo al carrito
            const idProduct = document.querySelector('#idproduct').textContent;
            const titleProduct = document.querySelector('#titleProduct').textContent;
            const srcImageProduct = document.querySelector('#srcImageProduct').src;

            // El carrito tiene productos?
            if( ProductsLocalStorage === null ){
                quantity++;
                quantityProductDetail.textContent = quantity;

                let newProduct = {
                    id: idProduct,
                    title: titleProduct,
                    quantity: quantity,
                    image: srcImageProduct
                }

                // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda

                // obtengo la tienda seleccionada del LocalStorage
                const brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');

                // veo si existe tal tienda
                if (brandSelectedInBrandDetailView !== null) {
                    const priceProductDetailBrandView = document.getElementById('priceProductDetailBrandView')

                    // veo si estoy en la vista de detalles del producto de la tienda
                    if(priceProductDetailBrandView !== null){
                        let price = priceProductDetailBrandView.textContent;

                        newProduct = {
                            id: idProduct,
                            title: titleProduct,
                            quantity: quantity,
                            price: price,
                            image: srcImageProduct
                        }

                    }

                }

                let ProductsLocalStorage = '['+JSON.stringify(newProduct)+']';

                // Muestro el span que indica que hay producots en el carrito
                updateTotalProductsShoppingCar(JSON.parse(ProductsLocalStorage));
                shownHideCompareFloatButton(arrayProductsLocalStorage);
                // Almaceno el producto en el localStorage
                localStorage.setItem('productsShoppingCar',ProductsLocalStorage);

            // El carrito tiene productos
            }else{

                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                let productInShppingCar = false;
                // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
                arrayProductsLocalStorage.forEach(product => {
                    if (idProduct == product.id ){
                        productInShppingCar = true;
                        quantity++;
                        quantityProductDetail.textContent = quantity;
                        product.quantity = quantity;
                    }
                });

                // El producto estaba en el carrito de compras?
                if (productInShppingCar){

                    // Muestro el span que indica que hay producots en el carrito
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                    // Almaceno en local storage
                    localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                    // El producto no estaba en el carrito de compras, es nuevo!
                }else{

                    quantity++;
                    quantityProductDetail.textContent = quantity;

                    let newProduct = {
                        id: idProduct,
                        title: titleProduct,
                        quantity: quantity,
                        image: srcImageProduct
                    }

                    // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda

                    // obtengo la tienda seleccionada del LocalStorage
                    const brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');

                    // veo si existe tal tienda
                    if (brandSelectedInBrandDetailView !== null) {
                        const priceProductDetailBrandView = document.getElementById('priceProductDetailBrandView')

                        // veo si estoy en la vista de detalles del producto de la tienda
                        if(priceProductDetailBrandView !== null){
                            let price = priceProductDetailBrandView.textContent;

                            newProduct = {
                                id: idProduct,
                                title: titleProduct,
                                quantity: quantity,
                                price: price,
                                image: srcImageProduct
                            }

                        }

                    }

                    arrayProductsLocalStorage.push(newProduct);
                    // Muestro el span que indica que hay producots en el carrito
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);

                    // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

                }

            }

        });
    }

    if (subtractProduct !== null ){
        // Substraer producto
        subtractProduct.addEventListener('click', function(){

                // Obtengo los productos del local storage
                ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                // Obtengo los datos del producto
                let quantity = parseInt(quantityProductDetail.textContent);
                // Tomo los valores del producto para agregarlo al carrito
                const idProduct = document.querySelector('#idproduct').textContent;

                // La cantidad es mayor que cero?
                if( quantity > 0 ){

                    // El carrito tiene productos?
                    if( ProductsLocalStorage !== null ){
                        arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                        let productInShppingCar = false;
                        let keyArray = 0;
                        // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
                        arrayProductsLocalStorage.forEach(product => {
                            if (idProduct == product.id ){
                                productInShppingCar = true;
                                quantity--;
                                quantityProductDetail.textContent = quantity;
                                product.quantity = quantity;
                            }
                            if (!productInShppingCar){
                                keyArray++;
                            }
                        });

                        // La cantidad del producto es cero? -
                        if (quantity == 0) {
                            // Se elimina el producto del carrito de compras
                            arrayProductsLocalStorage.splice(keyArray, 1);
                        }

                        // Muestro el span que indica que hay producots en el carrito
                        updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                        shownHideCompareFloatButton(arrayProductsLocalStorage);

                        // Guardo en localstorage
                        localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                    }
                }

        });
    }


    /* Manejar los productos del Modal de Carrito de Compras*/

    // Incrementar la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelectorAll('.addProductModalShoppingCard').forEach(item => {
                item.addEventListener('click', event => {
                    // Obtengo los productos del local storage
                    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                    // En que elemento se dio click? en el spna, en el svg o en el path?
                    if ( event.target.nodeName == 'SPAN' ){
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }else if( event.target.nodeName == 'svg' ){
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }else {
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }

                    const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                    let quantity = parseInt( rootContainer.querySelector('.quantityCardProductShoppingCar').textContent.trim() );

                    arrayProductsLocalStorage.forEach(product => {
                        if (idProduct == product.id ){
                            quantity++;
                            product.quantity = quantity;
                        }
                    });
                    // Cantidad de productos en carrito, en vista de detalles de producto
                    const quantityProductDetail = document.querySelector('#quantityProductDetail');
                    if ( quantityProductDetail !== null ){
                        quantityProductDetail.textContent = quantity;
                    }

                    rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;

                    // actualizo el span de carrito de compras
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                    // actualizo la cantidad en el DOM de la vista de tienda, en caso se estar en la vista de detalles de la tienda seleccionada
                    updateQuantityProductsInBrandView(idProduct, quantity);
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                    updateAmount();

                });
            });

        });
    });

    // Reducir la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelectorAll('.substractProductModalShoppingCard').forEach(item => {
                item.addEventListener('click', event => {

                    // Obtengo los productos del local storage
                    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                    // En que elemento se dio click? en el spna, en el svg o en el path?
                    if ( event.target.nodeName == 'SPAN' ){
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }else if( event.target.nodeName == 'svg' ){
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }else {
                        var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                    }

                    const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                    let quantity = parseInt( rootContainer.querySelector('.quantityCardProductShoppingCar').textContent.trim() );

                    if (quantity > 0){

                        let productInShppingCar = false;
                        let keyArray = 0;

                        arrayProductsLocalStorage.forEach(product => {
                            if (idProduct == product.id ){
                                productInShppingCar = true;
                                quantity--;
                                product.quantity = quantity;
                            }
                            if (!productInShppingCar){
                                keyArray++;
                            }
                        });

                        rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;
                        // Cantidad de productos en carrito, en vista de detalles de producto
                        const quantityProductDetail = document.querySelector('#quantityProductDetail');
                        if ( quantityProductDetail !== null ){
                            quantityProductDetail.textContent = quantity;
                        }

                        // El producto llego a cero? se debe eliminar del local storage
                        if ( quantity == 0 ){
                            // Se elimina el producto del carrito de compras
                            arrayProductsLocalStorage.splice(keyArray, 1);

                            // Elimino el card del carrito
                            removeCardProductShoppingCar(idProduct);
                        }
                        // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
                        localStorageProducts(arrayProductsLocalStorage);
                        // actualizo el span de carrito de compras
                        updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                        shownHideCompareFloatButton(arrayProductsLocalStorage);
                        // actualizo la cantidad en el DOM de la vista de tienda, en caso se estar en la vista de detalles de la tienda seleccionada
                        updateQuantityProductsInBrandView(idProduct, quantity);
                        // Almaceno el producot en el localStorage
                        localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                        updateAmount();
                    }

                });
            });

        });
    });

    // Eliminar prodcuto del modal de carrito de compras, con boton de elminar que esta en el modal del carrito
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelectorAll('.removeProductModalShoppingCar').forEach(item => {
                item.addEventListener('click', event => {

                    // Obtengo los productos del local storage
                    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                    // En que elemento se dio click? en el spna, en el svg o en el path?
                    if( event.target.tagName == "path"){
                        var rootContainer = event.target.parentNode.parentNode.parentNode;
                    }else if( event.target.tagName == "svg" ){
                        var rootContainer = event.target.parentNode.parentNode;
                    }else{
                        var rootContainer = event.target.parentNode;
                    }

                    const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                    let productInShppingCar = false;
                    let keyArray = 0;

                    arrayProductsLocalStorage.forEach(product => {
                        if (idProduct == product.id ){
                            productInShppingCar = true;
                        }
                        if (!productInShppingCar){
                            keyArray++;
                        }
                    });

                    if (productInShppingCar) {
                        // Se elimina el producto del carrito de compras
                        arrayProductsLocalStorage.splice(keyArray, 1);
                        // Elminar el card del carrito
                        removeCardProductShoppingCar(idProduct);
                        // Cantidad de productos en carrito, en vista de detalles de producto
                        const quantityProductDetail = document.querySelector('#quantityProductDetail');
                        if ( quantityProductDetail !== null ){
                            quantityProductDetail.textContent = 0;
                        }

                        // Coloco en cero la cantidad del producto en la vista de la tienda
                        const brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');

                        if (brandSelectedInBrandDetailView !== null) {
                            const brand = JSON.parse(brandSelectedInBrandDetailView);

                            // Obtengo los productos del DOM
                            const productsIdDOM = document.querySelectorAll('.idProductBrand')

                            productsIdDOM.forEach(product => {
                                if( product.textContent == idProduct ){
                                    product.parentElement.querySelector('.quantityProductDetail').textContent = 0;
                                }
                            });

                        }
                    }
                    // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
                    localStorageProducts(arrayProductsLocalStorage);
                    // actualizo el span de carrito de compras
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                    updateAmount();
                });
            });

        });
    });



    // Al cargar el sitio web
    // Obtengo los productos del local storage
    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
    // Transformo el string a array
    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

    let compareFloatButton = document.getElementById('compareFloatButton');

    if( compareFloatButton !== null ){

        if( ProductsLocalStorage !== null){
            // Hay elementos en el carrito de compras?
            if(arrayProductsLocalStorage.length > 0) {
                compareFloatButton.classList.add("shownButton");
            }
        }

    }

    // Muestro el span de carrito de compras
    updateTotalProductsShoppingCar(arrayProductsLocalStorage);

    // Busco las cards de productos y verifico si se encuentran en el carrito de compras
    document.querySelectorAll('.idProductCard').forEach(product => {
        let idProduct = product.textContent;
        if(arrayProductsLocalStorage !== null){
            arrayProductsLocalStorage.forEach(item => {
                if ( item.id == idProduct ){
                    product.parentNode.querySelector('.svgProdcutInShoppingCar').style.display = 'block';
                }

            });
        }
    });



    // Oculto el modal al dar click afuera de el
    $(document).on("click",function(e) {
        const contentModalShopinngCar = document.getElementById('contentModalShopinngCar');
        const modalShoppingCar = document.getElementById('modalShoppingCar');

        // Verifico si el elemento al q se le dio click esta fuera del modal
        // Debe ser distinto ademas del boton q hace mostrar el modal
        let band = 0;
        // verifico se se dio click para abrir el modal
        document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
            if( item.contains( e.target ) ){
                band = 1;
            }
        });


            // console.log(e)
            // console.log(contentModalShopinngCar.contains(e.target))

            // verifico si se dio click fuera del modal
            // if( !contentModalShopinngCar.contains(e.target) && !band){
            //         modalShoppingCar.style.display = 'none';
            // }
    })
});



// Funcion para eliminar el card element del producto en el carrito de compras
function removeCardProductShoppingCar ( idProduct ){

    // Contenedor de todos los card de productos
    let containerProductsShoppingCar = document.getElementById('containerProductsShoppingCar');

    let cardItems = containerProductsShoppingCar.querySelectorAll('.idProductCardModalShoppingCar');
    cardItems.forEach(cardItem => {

        let idCardProduct = cardItem.textContent;

        if( idCardProduct == idProduct){
            cardItem.parentNode.remove();
        }

    });

}

// funcion para ocultar o mostrar botones y textos dependiendo de si hay o no productos en el localstorage
function localStorageProducts(arrayProductsLocalStorage){
    // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
    brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');

    if (arrayProductsLocalStorage.length > 0 ){

        if(brandSelectedInBrandDetailView === null ){
            document.getElementById('finalizarCompraButton').style.display = 'none';
            document.getElementById('compararButton').style.display = 'block';
            document.getElementById('compararButtonOutline').style.display = 'none';
        }else{
            document.getElementById('finalizarCompraButton').style.display = 'block';
            document.getElementById('compararButton').style.display = 'none';
            document.getElementById('compararButtonOutline').style.display = 'block';

        }
        document.getElementById('conProdcutos').style.display = 'block';
        document.getElementById('sinProdcutos').style.display = 'none';
    }else{

        if(brandSelectedInBrandDetailView === null ){
            document.getElementById('enlaceNoBrand').style.display = 'block';
            document.getElementById('enlaceConBrand').style.display = 'none';

        }else{
            brandSelected = JSON.parse(brandSelectedInBrandDetailView);
            href = brandSelected.href;
            let enlaceConBrand = document.getElementById('enlaceConBrand');

            // enlaceConBrand.querySelector('a');
            enlaceConBrand.querySelector('a').href = href;

            enlaceConBrand.style.display = 'block';
            document.getElementById('enlaceNoBrand').style.display = 'none';
        }
        document.getElementById('sinProdcutos').style.display = 'block';
        document.getElementById('conProdcutos').style.display = 'none';
        document.getElementById('compararButton').style.display = 'none';
        document.getElementById('compararButtonOutline').style.display = 'none';

        document.getElementById('finalizarCompraButton').style.display = 'none';

    }
}


// Funcion para actualizar productos en el boton flotante
function updateTotalProductsShoppingCar(arrayProductsLocalStorage){
    const spanQuantityFloatButtonShoppingCard = document.getElementById('spanQuantityFloatButtonShoppingCard');
    const badgeIconShoppingCarNavbar = document.getElementById('badgeIconShoppingCarNavbar');
    let quantityTotal = 0;

    if( spanQuantityFloatButtonShoppingCard !== null ){

        if( arrayProductsLocalStorage !== null ){

            if(arrayProductsLocalStorage.length == 0 ){

                spanQuantityFloatButtonShoppingCard.style.display = 'none';
                badgeIconShoppingCarNavbar.style.display = 'none';

            }else{
                arrayProductsLocalStorage.forEach(product => {
                    quantityTotal += product.quantity;
                });

                spanQuantityFloatButtonShoppingCard.style.display = 'flex';
                spanQuantityFloatButtonShoppingCard.lastElementChild.textContent = quantityTotal;
                badgeIconShoppingCarNavbar.style.display = 'block';
            }

        }

    }


}

// Mostrar u ocultar el boton flotante de comparar precios
function shownHideCompareFloatButton(arrayProductsLocalStorage){
    let compareFloatButton = document.getElementById('compareFloatButton');

    // Hay elementos en el carrito de compras?
    if(arrayProductsLocalStorage == 0) {
        compareFloatButton.classList.add("hiddeButton");
        compareFloatButton.classList.remove("shownButton");
    }else{
        compareFloatButton.classList.remove("hiddeButton");
        compareFloatButton.classList.add("shownButton");
    }
}


// actualizo la cantidad en el DOM de la vista de tienda, en caso se estar en la vista de detalles de la tienda seleccionada
function updateQuantityProductsInBrandView(product_id, quantity){

    // Ahora verifico si estoy en la vista de la tienda que se acaba de eliminar,
    let idProductsBrand = document.querySelectorAll('.idProductBrand');

    if( idProductsBrand.length > 0 ){
        // coloco todas las cantidades de los productos a cero, en el DOM
        idProductsBrand.forEach(product => {

            if( product.textContent == product_id ){


                product.parentElement.querySelector('.quantityProductDetail').textContent = quantity

            }

        });

    }

}

function updateAmount(){

    brandSelectedInBrandDetailView = localStorage.getItem('brandSelectedInBrandDetailView');

    if( brandSelectedInBrandDetailView !== null ){
        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
        // Transformo el string a array
        arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
        let amount = 0;

        arrayProductsLocalStorage.forEach(product => {
            let quantity = product.quantity;
            let price = product.price;
            amount = amount + quantity*price;
        });

        console.log(amount)
        let amountShoppingCar = document.getElementById('amountShoppingCar')
        amountShoppingCar.textContent = `${amount} USD$`;

    }

}




