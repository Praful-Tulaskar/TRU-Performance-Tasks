const search = () =>{
    const searchbox = document.getElementById('search-item').value.toUpperCase();
    const storeitems = document.getElementsByClassName('product-list')[0];
    const product = document.querySelectorAll('.product');
    const productName = document.getElementsByTagName('h2');


    for(var i = 0; i < product.length; i++){
        
        let match = product[i].getElementsByTagName('h2')[0];

        if(match){
            // let textvalue = match.textContent || match.innerHTML;    //Es 2no line se h2 element me jo text h wo milega
            let textvalue = match.innerHTML;

            if(textvalue.toUpperCase().indexOf(searchbox) > -1){    //Es line me textvalue ko search box k value k sath compare krega
                product[i].style.display = "";
            }
            else{
                product[i].style.display = "none";
            }
        }
    }
}