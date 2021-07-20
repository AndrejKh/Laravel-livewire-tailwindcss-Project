// Script para Carrito de compras
document.addEventListener("DOMContentLoaded", function() {
    /* VISIBILIDAD DEL CARRITO DE COMPRAS */

    // Modal de carrito de compras
    const modalShoppingCar = document.querySelector('#modalShoppingCar');

    // Seleccion los elementos que abren el modal de carrito, y les agrego el evento 'click'
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {
            // Mostrar el monto total de los productos
            document.getElementById('amountContainerShoppingCar').style.display = 'none';
            // Hago visible el modal
            modalShoppingCar.style.display = 'block';

            // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
            let brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
            //  obtengo el contenedor donde se mostrara la marca seleccionada
            const containerBrandShoppingCar = document.getElementById('containerBrandShoppingCar');
            containerBrandShoppingCar.innerHTML = '';
            // Obtengo el componente card de ejemplo
            const cardBrandShoppingCar = document.getElementById('cardBrandShoppingCar');
            if( brandSelectedToBuy !== null ){
                // Llevo el string al formato JSON
                let brandSelected = JSON.parse(brandSelectedToBuy);

                // creo un clon del card de ejemplo
                let newCardBrandShoppingCar = cardBrandShoppingCar.firstElementChild.cloneNode(true);
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
            let ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            // Hay elementos en el carrito de compras?
            if(ProductsLocalStorage !== null) {
                // Llevo el string al formato JSON
                let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
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
                    if( brandSelectedToBuy !== null ){
                        newPrice.textContent = `${product.price} USD$`;
                        // Mostrar el monto total de los productos
                        document.getElementById('amountContainerShoppingCar').style.display = 'inline';
                    }


                    // Inserto el card en el modal
                    containerProductsShoppingCar.appendChild(newCardProductShoppingCar);
                });

            }

            // Eliminar la tienda donde se esta comprando
            const deleteBrandDetailInShoppingCar = document.getElementById('deleteBrandDetailInShoppingCar');

            if(deleteBrandDetailInShoppingCar !== null){
                deleteBrandDetailInShoppingCar.addEventListener('click', event => {
                    localStorage.removeItem('brandSelectedToBuy');
                    document.getElementById('brandInShoppingCar').setAttribute("hidden", true);
                    document.getElementById('amountContainerShoppingCar').style.display = 'none';
                    document.getElementById('finalizarCompraButton').style.display = 'none';
                    document.getElementById('compararButtonOutline').style.display = 'none';
                    document.getElementById('compararButton').style.display = 'inline';


                    // verifico si hay produtos en el carrito
                    // Obtengo los productos del local storage
                    let ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                    if( ProductsLocalStorage !== null ){
                        let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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

                                    updateBrandsPrice(0);

                                });

                            }
                        }
                    }

                }, {passive: true})
            }

            updateAmount();

            // Finalizar compra, al dar click en el boton comprar
            const finalizarCompra = document.getElementById('finalizarCompra');
            finalizarCompra.addEventListener('click', event => {

                // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
                const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
                const brand = JSON.parse(brandSelectedToBuy);

                if (brandSelectedToBuy !== null) {

                    // Obtengo los productos del local storage
                    const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    const products = JSON.parse(ProductsLocalStorage);
                    const amountSelected = localStorage.getItem('amount');
                    const amount = JSON.parse(amountSelected);

                    const csrf_token = document.getElementById('csrf_token').textContent;

                    const data = {
                        products: products,
                        brand: brand,
                        amount: amount,
                    }

                    axios({
                        method  : 'POST',
                        url     : '/post/create-order',
                        data    : data,
                        headers : {
                            'content-type': 'application/json',
                            'X-CSRF-Token': csrf_token
                            }
                    })
                    .then((res)=>{
                        if(res.data === 0){
                            // El usuario no esta logeado, lo redirijo a la vista de login
                            window.location.href = "/login?r=1";
                        }else{
                            // elimino los datos del local storage
                            localStorage.removeItem('amount');
                            localStorage.removeItem('brandSelectedToBuy');
                            localStorage.removeItem('productsShoppingCar');
                            // redirecciono a la vista compras
                            window.location.href = "/cms/compras";
                        }

                    })
                    .catch((err) => {console.log(err)});

                }

            }, {passive: true})
        }, {passive: true});
    });

    // Boton para cerrar carrito de compras
    const shoppingCarButtonModalClose = document.querySelector('#shoppingCarButtonModalClose');

    // Ocultar el modal de carrito de compras
    if(shoppingCarButtonModalClose !== null){
        shoppingCarButtonModalClose.addEventListener('click', function(){
            modalShoppingCar.style.display = 'none';
        }, {passive: true});
    }

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
            const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

            // Obtengo los datos del producto
            let quantity = parseInt(quantityProductDetail.textContent);
            // Tomo los valores del producto para agregarlo al carrito
            const idProduct = document.querySelector('#idproduct').textContent;
            const titleProduct = document.querySelector('#titleProduct').textContent.trim();
            const srcImageProduct = document.querySelector('#srcImageProduct').src;

            // El carrito tiene productos?
            if( ProductsLocalStorage === null ){
                quantity++;
                quantityProductDetail.textContent = quantity;

                newProduct = setNewProduct( idProduct, titleProduct, quantity, 0, srcImageProduct );

                // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda

                // obtengo la tienda seleccionada del LocalStorage
                const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

                // veo si existe tal tienda
                if (brandSelectedToBuy !== null) {
                    const priceProductDetailBrandView = document.getElementById('priceProductDetailBrandView')

                    // veo si estoy en la vista de detalles del producto de la tienda
                    if(priceProductDetailBrandView !== null){
                        let price = priceProductDetailBrandView.textContent;

                        newProduct = setNewProduct( idProduct, titleProduct, quantity, price, srcImageProduct );

                    }else{
                            const quantityAvalaible = document.getElementById('quantityProductDOM').textContent;
                            const priceProductDOM = document.getElementById('priceProductDOM')
                            let price = priceProductDOM.textContent;

                            if( quantityAvalaible !== '' ){
                                // El producto esta disponible en esta marca
                                newProduct = setNewProduct( idProduct, titleProduct, quantity, price, srcImageProduct );

                            }else{
                                // producto no disponible en esta marca
                                // eliminao la marca del local storage
                                localStorage.removeItem('brandSelectedToBuy');
                                document.getElementById('brandInShoppingCar').setAttribute("hidden", true);
                                // notificacion de que ya no se esta comprando en la marca
                                newProduct = setNewProduct( idProduct, titleProduct, quantity, 0, srcImageProduct );
                            }

                    }

                }

                let newProductLocalStorage = '['+JSON.stringify(newProduct)+']';

                // Muestro el span que indica que hay producots en el carrito
                updateTotalProductsShoppingCar(JSON.parse(newProductLocalStorage));
                shownHideCompareFloatButton(newProductLocalStorage);
                updateBrandsPrice(quantity);
                // Almaceno el producto en el localStorage
                localStorage.setItem('productsShoppingCar',newProductLocalStorage);

            // El carrito tiene productos
            }else{

                let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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
                    updateBrandsPrice(quantity);
                    // Almaceno en local storage
                    localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                    // El producto no estaba en el carrito de compras, es nuevo!
                }else{

                    quantity++;
                    quantityProductDetail.textContent = quantity;

                    newProduct = setNewProduct( idProduct, titleProduct, quantity, 0, srcImageProduct );

                    // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda

                    // obtengo la tienda seleccionada del LocalStorage
                    const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

                    // veo si existe tal tienda
                    if (brandSelectedToBuy !== null) {
                        const priceProductDetailBrandView = document.getElementById('priceProductDetailBrandView')

                        // veo si estoy en la vista de detalles del producto de la tienda
                        if(priceProductDetailBrandView !== null){

                            let price = priceProductDetailBrandView.textContent;
                            newProduct = setNewProduct( idProduct, titleProduct, quantity, price, srcImageProduct );

                        }else{

                            // Estoy en la vista de detalles del producto, vista general
                            // verifico si la tienda tiene el producto en su inventario
                            const quantityAvalaible = document.getElementById('quantityProductDOM').textContent;
                            const priceProductDOM = document.getElementById('priceProductDOM')
                            let price = priceProductDOM.textContent;

                            if( quantityAvalaible !== '' ){
                                // El producto esta disponible en esta marca
                                newProduct = setNewProduct( idProduct, titleProduct, quantity, price, srcImageProduct );

                            }else{
                                // producto no disponible en esta marca
                                // eliminao la marca del local storage
                                localStorage.removeItem('brandSelectedToBuy');
                                document.getElementById('brandInShoppingCar').setAttribute("hidden", true);
                                // notificacion de que ya no se esta comprando en la marca
                                newProduct = setNewProduct( idProduct, titleProduct, quantity, 0, srcImageProduct );
                            }

                        }

                    }

                    arrayProductsLocalStorage.push(newProduct);
                    // Muestro el span que indica que hay producots en el carrito
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                    updateBrandsPrice(quantity);

                    // Agrego el precio del producto, en caso de tener una tienda seleccionada y estar en la vista de detalles del producto de la tienda
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

                }

            }

        }, {passive: true});
    }

    if (subtractProduct !== null ){
        // Substraer producto
        subtractProduct.addEventListener('click', function(){

                // Obtengo los productos del local storage
                const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                // Obtengo los datos del producto
                let quantity = parseInt(quantityProductDetail.textContent);
                // Tomo los valores del producto para agregarlo al carrito
                const idProduct = document.querySelector('#idproduct').textContent;

                // La cantidad es mayor que cero?
                if( quantity > 0 ){

                    // El carrito tiene productos?
                    if( ProductsLocalStorage !== null ){
                        let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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
                        updateBrandsPrice(quantity);

                        // Guardo en localstorage
                        localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                    }
                }

        }, {passive: true});
    }

    /* Manejar los productos del Modal de Carrito de Compras*/

    // Editar la cantidad de productos en el modal de carrito de compras
    document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
        item.addEventListener('click', event => {

            // Incrementar la cantidad de productos en el modal de carrito de compras, desde el modal del carrito
            setQuantiyFromShoppingCar( 'addProductModalShoppingCard', 'add' );

            // Reducir la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
            setQuantiyFromShoppingCar( 'substractProductModalShoppingCard', 'substract' );

            // Eliminar prodcuto del modal de carrito de compras, con boton de elminar que esta en el modal del carrito
            document.querySelectorAll('.removeProductModalShoppingCar').forEach(item => {
                item.addEventListener('click', event => {

                    // Obtengo los productos del local storage
                    let ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                    let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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
                        const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

                        if (brandSelectedToBuy !== null) {
                            const brand = JSON.parse(brandSelectedToBuy);

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
                    updateBrandsPrice(0);
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                    updateAmount();
                }, {passive: true});
            });

        }, {passive: true});
    });


    // Al cargar el sitio web
    // Obtengo los productos del local storage
    const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
    // Transformo el string a array
    let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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


    // cerrar modal de carrito de compras al dar click fuera de el
    const contentModalShopinngCar = document.getElementById('contentModalShopinngCar')
    const backgroundModalShoppingCar = document.getElementById('backgroundModalShoppingCar')
    backgroundModalShoppingCar.addEventListener('click', event => {
        if( !contentModalShopinngCar.contains(event.target) ){
            modalShoppingCar.style.display = 'none';
        }
    })

}, {passive: true});

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
    const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

    if (arrayProductsLocalStorage.length > 0 ){

        if(brandSelectedToBuy === null ){
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

        if(brandSelectedToBuy === null ){
            document.getElementById('enlaceNoBrand').style.display = 'block';
            document.getElementById('enlaceConBrand').style.display = 'none';
        }else{
            brandSelected = JSON.parse(brandSelectedToBuy);
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
        // Mostrar el monto total de los productos
        document.getElementById('amountContainerShoppingCar').style.display = 'none';

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

// Actualizar monto total
function updateAmount(){

    const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

    if( brandSelectedToBuy !== null ){
        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
        // Transformo el string a array
        let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
        let amount = 0;

        arrayProductsLocalStorage.forEach(product => {
            let quantity = product.quantity;
            let price = product.price;
            amount = amount + quantity*price;
        });

        let amountShoppingCar = document.getElementById('amountShoppingCar')
        amountShoppingCar.textContent = `${amount} USD$`;

        // guardar el monto en el localStorage
        let amountTotal = {
            amount: amount
        };

        // Almaceno el preico total en el local storage
        localStorage.setItem('amount',JSON.stringify(amountTotal));


    }

}

// Actualizar la cantidad productos desde el carrito de compras
function setQuantiyFromShoppingCar( editButton, typeSet ){

    // Reducir la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
    document.querySelectorAll('.'+editButton).forEach(item => {
        item.addEventListener('click', event => {

            // Obtengo los productos del local storage
            let ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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

            if ( ( quantity > 0 && typeSet == 'substract' ) || typeSet == 'add'){

                let productInShppingCar = false;
                let keyArray = 0;

                arrayProductsLocalStorage.forEach(product => {
                    if (idProduct == product.id ){
                        productInShppingCar = true;
                        if( typeSet == 'add' ){
                            product.quantity = ++quantity;
                        }else{
                            product.quantity = --quantity;
                        }
                    }
                    if (!productInShppingCar){
                        keyArray++;
                    }
                });

                // SOLO PARA SUBSTRACT
                // El producto llego a cero? se debe eliminar del local storage
                if ( quantity == 0 && typeSet == 'substract' ){
                    // Se elimina el producto del carrito de compras
                    arrayProductsLocalStorage.splice(keyArray, 1);

                    // Elimino el card del carrito
                    removeCardProductShoppingCar(idProduct);
                }

                // preguntar si el id del producto que estoy incrementando es el mismo de la vista de detalles
                const id_product_DOM = document.getElementById('idproduct');
                if( id_product_DOM !== null ){

                    if( id_product_DOM.textContent == idProduct ){
                        // actualizo la cantidad del producto en la vista de detalles
                        // Cantidad de productos en carrito, en vista de detalles de producto
                        const quantityProductDetail = document.querySelector('#quantityProductDetail');
                        if ( quantityProductDetail !== null ){
                            quantityProductDetail.textContent = quantity;
                        }

                        updateBrandsPrice(quantity);

                    }
                }
                rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;
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

        } ,{passive: true});
    });

}

// Crear un objeto para un nuevo product
function setNewProduct( product_id, title, quantity, price, image ){
    let newProduct = {
        id: product_id,
        title: title,
        quantity: quantity,
        price: price,
        image: image
    }
    return newProduct;
}
