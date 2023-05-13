
const url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=f5eef3421c602c6cb7ea224104795888";

const url1 = "https://picsum.photos/v2/list?page=1&limit=5";
let url2 = ip1.document.querySelector('#ip1').value

fetch(url)
.then(res => {return res.json()})
.then(data => makeList(data))
.catch(console.log);

function makeList(data){
    data.forEach(item => {
        console.log(item);
        // const tagImg = document.createElement('img')
        // tagImg.setAttribute('src',item.download_url);
        // document.getElementById('div1').appendChild(tagImg);
        
    });
}

let bt1 = document.querySelector('#bt1');

    bt1.addEventListener('click',()=>{
    let ip1 = document.querySelector('#ip1').value
    if(ip1 === ""){
        alert('입력하세요');
    }
    else if(document.getElementById('div1')!="") {
        document.getElementById('div1').innerHTML = ""
        fetch(ip1)
        .then(res => {return res.json()})
        .then(data => makeList(data))
        .catch(() => alert('없는url'));
    }
}); 