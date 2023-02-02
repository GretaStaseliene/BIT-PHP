<div class="container text-center">
    <div class="d-flex justify-content-center mb-3">
        <h2> Pasirinkite kortelę </h2>
    </div>

    <?php for ($i = 1; $i < 4; $i++) : ?>
        <div class="card me-4 d-inline-block" style="width: 18rem;">
            <img src="https://www.swedbank.lt/img/introduction/826x521_Student_web_card.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Pasirinkite</a>
            </div>
        </div>
    <?php endfor; ?>
</div>