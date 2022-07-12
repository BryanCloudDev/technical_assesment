<?= $this->include('./components/header.php') ?>
</body>
<div class="container">

</div>
<section class="min-vh-100 gradient-custom d-flex align-items-center">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="form-box card text-dark animate__animated animate__fadeInDown">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Complete purchase</h2>
                            <form action="/create/detalle" method="post">
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Name</label>
                                    <input type="text" name="nombre_cliente" class="form-control form-control">
                                </div>
                                <div class="label form-outline form-white mb-4">
                                    <label class="form-label text-start">Item</label>
                                    <input type="text" name="item" value="<?= $data['nombre_producto']; ?>" class="form-control form-control">
                                    <input type="hidden" name="id_producto" value="<?= $data['id_producto']; ?>" class="form-control form-control">
                                </div>
                                <button class="name-button bg-dark btn btn-outline-light btn-lg px-5" type="submit">Comprar</button>
                            </form>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>