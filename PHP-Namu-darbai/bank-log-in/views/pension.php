<div class="container text-center">
    <div class="d-flex justify-content-center mb-3">
        <h2>Pasirinkite pensijų pakopą</h2>
    </div>

    <?php 
        $pensions = ['Pirma pensiju pakopa', 'Antra pensiju pakopa', 'Trecia pensiju pakopa'];

    foreach ($pensions as $pension) : ?>
        <div class="card ms-5 me-4 d-inline-block" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $pension ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Pasirinkite</a>
            </div>
        </div>
    <?php endforeach; ?>