    let cart = [];
    let totalPrice = 0;

    function addToCart(id,name,image,price) {
        cart.push({id,name,image,price});
        totalPrice += price
        displayArrayValues(cart,totalPrice)
        console.log(cart)
        console.log(totalPrice)
        
    }

    function displayArrayValues(myArray,totalPrice) {
        const arrayDiv = document.getElementById('array-values');
        const totalprice = document.getElementById('totalprice');
        const checkout = document.getElementById('checkout');
        totalprice.textContent = "₦" + totalPrice;
        
        const totallength = document.getElementById('totallength');
        totallength.textContent = myArray.length;

        // Clear previous content
        arrayDiv.innerHTML = "";
        var orderItems = ""
        // Loop through the array and display values
        myArray.forEach((item, index) => {
            

            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>₦" + `${item.price}` + "</span></div></li>";
            
            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv.appendChild(h4);
            console.log(item.id)
            orderItems += item.id + "-"
        });
        checkout.href = "/checkout?items="+orderItems


        const arrayDiv2 = document.getElementById('array-values2');
        const totalprice2 = document.getElementById('totalprice2');
        const checkout2 = document.getElementById('checkout2');
        totalprice2.textContent = "₦" + totalPrice;
        
        const totallength2 = document.getElementById('totallength2');
        totallength2.textContent = myArray.length;

        // Clear previous content
        arrayDiv2.innerHTML = "";

        // Loop through the array and display values
        myArray.forEach((item, index) => {
            

            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>₦" + `${item.price}` + "</span></div></li>";
            
            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv2.appendChild(h4);

        });
        checkout2.href = "/checkout?items="+orderItems+"adname="
    }
