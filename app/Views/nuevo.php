<?= $this->include('./components/header.php') ?>
</body>
<section class="min-vh-100 gradient-custom d-flex align-items-center">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="form-box card text-dark animate__animated animate__fadeInDown">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Producto</h2>
                            <form action="/create/producto" method="GET">
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Nombre del producto</label>
                                    <input type="text" value="<?php if(isset($data)){echo $data['nombre_producto'];}?>" name="nombre_producto" class="form-control form-control">
                                </div>
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Descripcion</label>
                                    <input type="text" value="<?php if(isset($data)){echo $data['descripcion_producto'];}?>" name="descripcion_producto" class="form-control form-control">
                                </div>
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Imagen</label>
                                    <input type="text" value="<?php if(isset($data)){echo $data['imagen'];}?>" name="imagen" class="form-control form-control">
                                </div>
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Precio</label>
                                    <input type="text" value="<?php if(isset($data)){echo $data['precio'];}?>" name="precio" class="form-control form-control">
                                </div>
                                <button class="name-button bg-dark btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>