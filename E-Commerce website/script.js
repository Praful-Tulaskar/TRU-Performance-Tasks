let darkModeBtn = document.getElementsByClassName('darkmode-btn')[0];
let nodelist = document.querySelectorAll('.mode');
let nodelist2 = document.querySelectorAll('.section-4-bg-mode');
let bgnodelist = document.querySelectorAll('.bg-mode');
// console.log(nodelist.length);

function toggleMode(){
    // console.log("btn clicked");
    
    if(document.getElementById('maincontent').style.backgroundColor == 'black'){

        darkModeBtn.innerHTML = "Dark Mode";
        document.getElementById('maincontent').style.backgroundColor = 'white';
        nodelist2[0].style.backgroundColor = '#fafafa';
        for(let i = 0; i < nodelist.length; i++){
            // console.log("y");
            nodelist[i].style.color = 'black';
            // console.log("z");
        }

        // for(let i = 0; i < bgnodelist.length; i++){
        //     bgnodelist[i].style.backgroundColor = 'black';
        // }
    }
    else{

        darkModeBtn.innerHTML = "Light Mode";
        document.getElementById('maincontent').style.backgroundColor= 'black';
        nodelist2[0].style.backgroundColor = 'black';
        
        for(let i = 0; i < nodelist.length; i++){
            // console.log("y");
            nodelist[i].style.color = 'white';
            // console.log("z");
        }

        for(let i = 0; i < bgnodelist.length; i++){
            bgnodelist[i].style.backgroundColor = 'white';
        }
    }
}