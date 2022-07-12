<?= $this->include('./components/header.php') ?>
<style>
    .card {
        /* flex-wrap: wrap; */
    }
</style>
</body>
<section class="gradient-custom d-flex align-items-center mt-5">
    <div class="container py-5 h-100 d-flex flex-wrap" id="container">
        <div class="row w-100">
            <h2>Articulos</h2>
        </div>
    </div>
</section>
<script>
    const url = 'http://localhost:8080/productos'
    const http = new XMLHttpRequest()
    const container = document.getElementById('container');
    let respose;
    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            respose = JSON.parse(this.responseText);
            console.log(respose);
            for(let i = 0; i < respose.length; i++){
                container.innerHTML += `
                <div class="col-sm-3 mt-4 m-4">
            <div class="card cardC">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-header-color">
                            <img src="${respose[i].imagen}" class="card-img-top" alt="...">
                        </h5>
                        <dl>
                            <dt>${respose[i].producto} $${respose[i].precio}</dt>
                            <dd>${respose[i].descripcion_producto}</dd>
                        </dl>
                        <a href="/purchase?id=${respose[i].id}" class="btn btn-primary">Purchase</a>
                    </div>
                </div>
            </div>
        </div>`;
            }
        }
    }
    http.open("GET", url);
    http.send();
</script>

</html>